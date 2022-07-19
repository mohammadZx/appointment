<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Relationship;
use App\Models\Service;
use App\Models\SubService;
use App\Options\Uploader;
use Illuminate\Http\Request;

class SubServiceController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = SubService::orderBy('id','DESC')->paginate(PREPAGE);
        $aservices = SubService::orderBy('id','DESC')->get();
        $mservices = Service::orderBy('id','DESC')->get();
        return view('admin.service.sub.index', [
            'services' => $services,
            'mservices' => $mservices,
            'aservices' => $aservices
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
            'service_id' => 'required|exists:services,id'
        ]);

        $service = new SubService();
        $service->title = $request->title;
        $service->service_id = $request->service_id;
        $service->content = $request->content;

        $service->save();

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
    public function edit(SubService $subservice)
    {

        $mservices = Service::orderBy('id','DESC')->get();
        return view('admin.service.sub.add-or-edit', [
            'service' => $subservice,
            'mservices' => $mservices
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubService $subservice)
    {

        $request->validate([
            'title' => 'required',
            'service_id' => 'required|exists:services,id'
        ]);

        $subservice->title = $request->title;
        $subservice->service_id = $request->service_id;
        $subservice->content = $request->content;
        $subservice->save();

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
    public function destroy(Request $request, SubService $subservice)
    {
        $request->validate([
            'subservice_listing' => 'required|exists:sub_services,id|not_in:' . $subservice->id,
            'subservice_appointments' => 'required|exists:sub_services,id|not_in:' . $subservice->id,
        ]);
    
        $subservice->listings()->update([
            'sub_service_id' => $request->subservice_listing
        ]);

        Relationship::where('target_type', 'App\Models\Appointment')
        ->where('target_id' , $subservice->id)->update([
            'target_id' => $request->subservice_appointments
        ]);

        $subservice->delete();

        return redirect()->back()->with('message', [
            'type' => 'success',
            'message' => __('app.Item successfully deleted')
        ]);
    }
}
