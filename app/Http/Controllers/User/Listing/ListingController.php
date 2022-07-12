<?php

namespace App\Http\Controllers\User\Listing;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Rules\ServicesRule;
use App\Rules\WorktimesRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $listings = $user->listings()->orderBy('id', 'DESC')->paginate(PREPAGE);
        return view('user.listings', [
            'listings' => $listings
        ]);
    }

   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('auth');
        if(session()->has('listing-attachments')) session()->remove('listing-attachments');

        return view('listing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        if($validator->fails()){
            dd($validator->errors());
        }

        $validator->validate();

        $listing = new Listing();
        $listing->status = 0;
        $listing->name = $request->listing_title;
        $listing->content = $request->content;
        $listing->user_id = auth()->user()->id;
        $listing->service_id = $request->listing_category;
        $listing->address = $request->address;
        $listing->capacity = $request->has('listing_capacity') ?  $request->listing_capacity : 1;
        $listing->city_id = $request->city;
        $listing->flexibility = $request->has('flexibility') ? $request->flexibility : null; 
        $listing->save();

        // add meta data
        $listing->setMeta('social_instagram', $request->has('instagram') ? $request->instagram : null);
        $listing->setMeta('social_whatsapp', $request->has('whatsapp') ? $request->whatsapp : null);
        $listing->setMeta('fixed_phone', $request->has('fixed_phone') ? $request->fixed_phone : null);
        $listing->setMeta('map', $request->latitude .','. $request->longitude);
        if(session()->has('listing-attachments')){
            $images = session()->get('listing-attachments');
            foreach($images as $image){
                $listing->setMeta('thumbnail_id', $image);
            }
        }


        // add listing times
        foreach($request->worktimes as  $item){
            $listing->times()->create([
                'time_start' => $item['time_start'],
                'time_end' => $item['time_end'],
                'week_day' => $item['workhours'],
                'type' => $item['type'],
            ]);
        }

        // add listing services
        foreach($request->services as  $item){
            $listing->services()->create([
                'sub_service_id' => $item['lilsting_services'],
                'time' => $item['time'],
                'price' => $item['price'],
            ]);
        }


        session()->remove('listing-attachments');
        return to_route('user.listing.index')->with('message', [
            'type' => 'success',
            'message' => __('app.Your listin publish successfully and after approve show to anyone')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('listing.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect()->back()->with('message' , [
            'type' => 'success',
            'message' => 'مورد با موفقیت حذف شد'
        ]);
    }
}
