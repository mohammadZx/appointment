<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Options\Uploader;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $user = auth()->user();

        return view('user.profile', [
            'user' => $user
        ]);
    }

    public function storeData(Request $request){
        $user = auth()->user();
        $request->validate([
            'name' => 'required|max:255|min:10',
            'email' => 'nullable|email',
            'image' => 'nullable|file|max:500|mimes:jpg,bmp,png,webp,jpeg,gif'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        if($request->has('image') && $request->image){
            $image = Uploader::add($request->image);
            $user->setMeta('user_avatar', $image->id, 0, true);
        }

        if($request->has('state') && $request->state){
            $user->setMeta('state', $request->state, 0, true);
        }
        if($request->has('address') && $request->address){
            $user->setMeta('address', $request->address, 0, true);
        }
        if($request->has('bio') && $request->bio){
            $user->setMeta('bio', $request->bio, 0, true);
        }

        return redirect()->back()->with('message', [
            'type' => 'success', 
            'message' => __('app.Your profile has edited successfully')
        ]);

    }
}
