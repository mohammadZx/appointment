<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Options\Uploader;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:see_service', ['only' => ['index']]);   
        $this->middleware('can:edit_service', ['only' => ['edit', 'update']]);   
        $this->middleware('can:delete_service', ['only' => ['destroy']]);    
        $this->middleware('can:insert_service', ['only' => ['store']]);    

    }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('id','DESC')->get();
        return view('admin.service.index', [
            'services' => $services
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|file|max:1024|mimes:jpg,bmp,png,webp,jpeg,gif',
            'category_id' => 'required|exists:categories,id'
        ]);

        $image = null;
        if($request->image){
            $upload = Uploader::add($request->image);
            $image = $upload->id;
        }

        $category = new Service();
        $category->title = $request->title;
        $category->category_id = $request->category_id;
        $category->icon = $request->icon;
        $category->content = $request->content;
        $category->thumbnail_id = $image;

        $category->save();

        return redirect()->back()->with('message', [
            'type' => 'success',
            'message' => __('app.Item successfully added')
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
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.service.add-or-edit', [
            'service' => $service
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|file|max:1024|mimes:jpg,bmp,png,webp,jpeg,gif',
            'category_id' => 'required|exists:categories,id'
        ]);

        if($request->image){
            Uploader::delete($service->thumbnail_id);
            $upload = Uploader::add($request->image);
            $service->thumbnail_id = $upload->id;
        }

        $service->title = $request->title;
        $service->category_id = $request->category_id;
        $service->icon = $request->icon;
        $service->content = $request->content;
        $service->save();

        return redirect()->back()->with('message', [
            'type' => 'success',
            'message' => __('app.Item successfully updated')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Service $service)
    {
        $request->validate([
            'service_listing' => 'required|exists:services,id|not_in:' . $service->id,
            'service_sub' => 'required|exists:services,id|not_in:' . $service->id
        ]);
        
        $service->subservices()->update([
            'service_id' => $request->service_sub
        ]);

        $service->listings()->update([
            'service_id' => $request->service_listing
        ]);
        
        $service->delete();

        return redirect()->back()->with('message', [
            'type' => 'success',
            'message' => __('app.Item successfully deleted')
        ]);
    }
}
