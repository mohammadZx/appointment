<?php

namespace App\Http\Controllers\Admin\Listing;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Rules\ServicesRule;
use App\Rules\WorktimesRule;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Validator;

class ListingController extends Controller
{
    public function index(){
        $pipelines = app(Pipeline::class)
        ->send(Listing::query())
        ->through([
            new \App\QueryFilters\City(Listing::class),
            new \App\QueryFilters\Service(Listing::class),
            new \App\QueryFilters\Status(Listing::class),
        ])
        ->thenReturn();
        $data = $pipelines->with(['service', 'user' => function($q){
            return $q->with(['meta']);
        }])->orderBy('id', 'DESC');
        return view('admin.listing.index', [
            'listings' => $data->paginate(PREPAGE)
        ]);
    }


    public function edit(Listing $listing){

        // set default image to session for handler in edit front with dropzon
        $images = [];
        foreach($listing->getMeta('thumbnail_id') as $image) $images[] = $image->meta_value;
        session()->put('listing-attachments', $images);

        return view('admin.listing.create', [
            'listing' => $listing,
            'edit' => true,
            'admin' => true,
            'route' => route('admin.listing.update', $listing->id)
        ]);

    }

    public function update(Request $request, Listing $listing){

        $validator = Validator::make($request->all(), [
            'listing_category' => 'required|exists:services,id',
            'listing_title' => 'required|max:255|min:5',
            'content' => 'required',
            'city' => 'required|exists:cities,id',
            'address' => 'required|min:5',
            'latitude' => 'required',
            'longitude' => 'required',
            'worktimes' => ['required', new WorktimesRule($request->all())],
            'services' => ['required', new ServicesRule($request->all())],
        ]);

        $validator->validate();

        $listing->status = 0;
        $listing->name = $request->listing_title;
        $listing->content = $request->content;
        $listing->user_id = auth()->user()->id;
        $listing->service_id = $request->listing_category;
        $listing->address = $request->address;
        $listing->capacity = $request->has('listing_capacity')  && $request->flexibility ?  $request->listing_capacity : 1;
        $listing->city_id = $request->city;
        $listing->flexibility = $request->has('flexibility') && $request->flexibility  ? $request->flexibility : 0; 
        $listing->save();

        // add meta data
        $listing->setMeta('message', null, 0 , true);
        $listing->setMeta('social_instagram', $request->has('instagram') ? $request->instagram : null, 0 , true);
        $listing->setMeta('social_whatsapp', $request->has('whatsapp') ? $request->whatsapp : null, 0 , true);
        $listing->setMeta('fixed_phone', $request->has('fixed_phone') ? $request->fixed_phone : null, 0 , true);
        $listing->setMeta('map', $request->latitude .','. $request->longitude, 0 , true);
        
        if(session()->has('listing-attachments')){
            $listing->meta()->where('meta_key','thumbnail_id')->delete();
            $images = session()->get('listing-attachments');
            foreach($images as $image){
                $listing->setMeta('thumbnail_id', $image);
            }
        }


        // add listing times
        $listing->times()->delete();
        foreach($request->worktimes as  $item){
            $listing->times()->create([
                'time_start' => $item['time_start'],
                'time_end' => $item['time_end'],
                'week_day' => $item['workhours'],
                'type' => $item['type'],
            ]);
        }

        // add listing services
        $listing->services()->delete();
        foreach($request->services as  $item){
            $listing->services()->create([
                'sub_service_id' => $item['lilsting_services'],
                'time' => $item['time'],
                'price' => $item['price'],
            ]);
        }


        session()->remove('listing-attachments');
        return to_route('admin.listing.index')->with('message', [
            'type' => 'success',
            'message' => __('app.Your listing updated successfully and after approve show to anyone')
        ]);

    }

    public function destroy(Listing $listing){
        $listing->delete();
        return redirect()->back()->with('message' , [
            'type' => 'success',
            'message' => 'مورد با موفقیت حذف شد'
        ]);
    }

    public function changeStatus(Request $request, Listing $listing){
        $request->validate([
            'status' => 'required'
        ]);

        $listing->status = $request->status;
        $listing->save();
        if($request->has('message')) $listing->setMeta('message', $request->message, 0, true);

        return redirect()->back()->with('messasge', [
            'type' => 'success',
            'message' => __('app.Your listing updated successfully and after approve show to anyone')
        ]);
    }
}
