<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Options\Uploader;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class UserController extends Controller
{
    public function index(){

        $pipelines = app(Pipeline::class)
        ->send(User::query())
        ->through([
            new \App\QueryFilters\UserSearch(User::class),
        ])
        ->thenReturn();
        $users = $pipelines->orderBy('id', 'DESC')->paginate(PREPAGE);

        return view('admin.user.index', [
            'users' => $users
        ]);
    }

    public function edit(User $user){
        return view('admin.user.add-or-edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user){

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
            'message' => __('app.Item successfully updated')
        ]);
    }

    public function destroy(User $user){
        $user->delete();  
        return redirect()->back()->with('message', [
            'type' => 'success',
            'message' => __('app.Item successfully deleted')
        ]);
    }
}
