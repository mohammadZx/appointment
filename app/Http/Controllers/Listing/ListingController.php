<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pipelines = app(Pipeline::class)
        ->send(Listing::query())
        ->through([
            new \App\QueryFilters\City(Listing::class),
            new \App\QueryFilters\Service(Listing::class),
        ])
        ->thenReturn();
        $data = $pipelines->with(['service', 'user' => function($q){
            return $q->with(['meta']);
        }])->orderBy('id', 'DESC');
        return view('listing.index', [
            'listings' => $data->paginate(PREPAGE)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        $similarListings = Listing::where('service_id', $listing->service_id)->orderBy('id', 'DESC')->limit(12)->get();
        $times = $listing->times()->selectRaw('week_day, CONCAT(time_start, "|", time_end) as time, GROUP_CONCAT(CONCAT(time_start, "|", time_end)) as weekdaytime')->groupBy('week_day')->get();
        $isNowOpen = ListingTimeController::isListingOpenNow($listing);
        return view('listing.show', [
            'listing' => $listing,
            'similarListings' => $similarListings,
            'times' => $times,
            'avaliable' => $isNowOpen
        ]);
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
}
