<?php
namespace App\Options;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;

class Uploader{
    public static function add($file, $name = null){
        // make name
        if(!$name){
            $attachment = Attachment::orderBy('id','desc')->first();
            $name = $attachment->id + 1 .'_'.time().'.'.$file->extension();
        }
        // move uploaded file
        $file->storeAs('/public/'.date('Y').'/' .date('m').'/',$name);
        
        // send uploaded file to database
        $attachment = new Attachment();
        $attachment->src = date('Y').'/' .date('m').'/'.$name;
        $attachment->save();
        $attachment->url = env("UPLOAD_PREFIX", 'storage') . "/" .$attachment->src;
        return $attachment;

        
    }
    public static function get($id){
        return Attachment::find($id);
    }
    public static function delete($id){
        $attachment = Attachment::find($id);
        if($attachment){
            Storage::delete($attachment->src);
            $attachment->delete();
        }
        return true;
    }
    public static function getAll($prePage = 50){
        return Attachment::limit($prePage)->get();
    }


}