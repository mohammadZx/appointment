<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Options\Uploader;
use Illuminate\Http\Request;

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
        return response()->json(['success' => ['id' => $image->id, 'name' => basename($image->src)], 'data' => $images]);
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

        session()->put('listing-attachments', $images);
        return response()->json(['success' => ['id' => $attachment->id, 'name' => basename($attachment->src)], 'data' => $images]);
    }
}
