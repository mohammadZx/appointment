<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Listing;
use App\Options\Uploader;
use Illuminate\Http\Request;
use File;

class ListingAttachmentController extends Controller
{

    public function store(Request $request){
        $image = Uploader::add($request->file);

        if(!session()->has('listing-attachments')){
            session()->put('listing-attachments', [$image->id]);
        }else{
            $images = session()->get('listing-attachments');
            $images[] = $image->id;
            session()->put('listing-attachments', $images);
        }

        $images = session()->get('listing-attachments');
        return response()->json(['success' => ['id' => $image->id, 'name' => $image->id], 'data' => $images]);
    }

    public function destroy(Attachment $attachment){
        if(!session()->has('listing-attachments')) return;
        $images = session()->get('listing-attachments');
        if(!in_array($attachment->id , $images)) return;

        $deleteImage = Uploader::delete($attachment->id);
        if($deleteImage){
            if (($key = array_search($attachment->id, $images)) !== false) {
                unset($images[$key]);
            }
        }

        if(request()->has('listing_id') && $listing = Listing::find(request()->listing_id)){
            $listing->meta()->where('meta_key' ,'thumbnail_id')->where('meta_value', $attachment->id)->delete();

        }

        session()->put('listing-attachments', $images);
        return response()->json(['success' => ['id' => $attachment->id, 'name' => $attachment->id], 'data' => $images]);
    }


    public function getImage(){
        $images = [];
        if(session()->has('listing-attachments')){
            $images = session()->get('listing-attachments');
        }
        foreach($images as $key => $image){
            $i = Uploader::get($image);
            if($i){
                $images[$key] = [];
                $images[$key]['name'] = $i->id;
                $images[$key]['size'] = null;
                $images[$key]['path'] = asset('storage/' . $i->src) ;
                $images[$key]['id'] = $i->id ;
            }
        }

        return response()->json($images);
    }
}
