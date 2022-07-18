<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Options\Uploader;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.category.index', [
            'categories' => $categories
        ]);
    }

    public function create(){

    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|file|max:1024|mimes:jpg,bmp,png,webp,jpeg,gif',
        ]);

        $image = null;
        if($request->image){
            $upload = Uploader::add($request->image);
            $image = $upload->id;
        }

        $category = new Category();
        $category->title = $request->title;
        $category->icon = $request->icon;
        $category->content = $request->content;
        $category->thumbnail_id = $image;

        $category->save();

        return redirect()->back()->with('message', [
            'type' => 'success',
            'message' => __('app.Item successfully added')
        ]);

    }

    public function edit(Category $category){
        return view('admin.category.add-or-update', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category){
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|file|max:1024|mimes:jpg,bmp,png,webp,jpeg,gif',
        ]);

        if($request->image){
            Uploader::delete($category->thumbnail_id);
            $upload = Uploader::add($request->image);
            $category->thumbnail_id = $upload->id;
        }

        $category->title = $request->title;
        $category->icon = $request->icon;
        $category->content = $request->content;
        $category->save();

        return redirect()->back()->with('message', [
            'type' => 'success',
            'message' => __('app.Item successfully updated')
        ]);
    }

    public function destroy(Request $request, Category $category){
    
        $request->validate([
            'cat' => 'required|exists:categories,id|not_in:' . $category->id
        ]);
        
        $category->services()->update([
            'category_id' => $request->cat
        ]);
        
        $category->delete();

        return redirect()->back()->with('message', [
            'type' => 'success',
            'message' => __('app.Item successfully deleted')
        ]);
    }
}
