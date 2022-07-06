<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ListingTimeController extends Controller
{

    public function getTimes(Request $request){
        // validation
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'services' => 'required',
            'listing_id' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $request->date = date('Y-m-d', strtotime(toGregorian($request->date)));

        if($request->has('appointment_id')){
            $bookingTimes = get_booking_times($request->date, $request->services, $request->listing_id, $request->appointment_id);
        }else{
            $bookingTimes = get_booking_times($request->date, $request->services, $request->listing_id);
        }
        
        return response()->json($bookingTimes);


    }

    public function checkTime(Request $request){

    }

    public static function isListingOpenNow($listing){
        $weekday = strtolower(date('l'));
        $time = date('H:i');
        $date = date('Y-m-d');
        $time = $listing->times()->where('week_day', $weekday)->where('time_start', '<=', $time)->where('time_end', '>=', $time)->where('type', 'main')->first();
        $exception = $listing->exceptions()->where('exception_date', $date)->first();
        if($exception || !$time) return false;
        return true;
    }
    
    public static function getWorkTimes($listing){
        $todayMain = $listing->times()->where('type', 'main')->get()->map(function($item) use($listing) {
            $slots =  $listing->times()->selectRaw('time_start as start, time_end as end')->where('week_day', $item->week_day)->where('type', 'slot')->get()->toArray();
            $trueTimes = get_splits($slots, $item->time_start, $item->time_end);
            foreach($trueTimes as $key => $startAndEnd){
                $trueTimes[$key] = implode('|', $startAndEnd);
            }  
            $item->weekdaytime = implode(',', $trueTimes);
            return $item;
        });

        return $todayMain;
    }
}
