<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('service.index', ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {

        $pipelines = app(Pipeline::class)
        ->send($service->listings())
        ->through([
            new \App\QueryFilters\City(Listing::class),
            new \App\QueryFilters\Service(Listing::class),
        ])
        ->thenReturn();
        $data = $pipelines->with(['service', 'user' => function($q){
            return $q->with(['meta']);
        }])->orderBy('id', 'DESC');

            
       return view('service.show', ['service' => $service, 'listings' => $data->paginate(PREPAGE)]);
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
    public function destroy($id)
    {
        //
    }


    public function subservices(Service $service){
        return response()->json(['data' => $service->subservices]);
    }
}
