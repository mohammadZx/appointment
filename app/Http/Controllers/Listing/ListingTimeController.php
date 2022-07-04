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
        $day = strtolower(date('l', strtotime($request->date))); // get weekday of user selected date
        
        
        // get dependencies
        $listing = Listing::findOrFail($request->listing_id);
        $exceptions = $listing->exceptions()->where('exception_date',$request->date )->first();
        $time = $listing->times()->where('week_day', $day)->whereType('main')->first(); //get times in week day for listings
        $timeSlots = $listing->times()->where('week_day', $day)->whereType('slot')->get();
        $services = $listing->services()->whereIn('id', $request->services)->get();
        $appointments = $listing->appointments()->where('date_start', 'LIKE', "%{$request->date}%")->where('status', 'none')->get();
        $timeSlot = 0; // handle servicing times
        $capture = []; // work time slots and appointment starts
        $bookingTimes = [];

        // get services times
        foreach($services as $service){
            $timeSlot += $service->time;
        }


        // calc minuts every appointment in request date and save in $captures
        foreach($appointments as $appointment){
            $capture[] = [
                'start' => date('H:i', strtotime($appointment->date_start)),
                'end' => date('H:i', strtotime($appointment->date_end))
            ];
        }
        foreach($timeSlots as $slot){
            $capture[] = [
                'start' => $slot->time_start,
                'end' =>  $slot->time_end
            ];
        }

        // get time splits
        $splits = get_splits($capture, $time->time_start, $time->time_end);

        foreach($splits as $split){
            $bookingTimes = array_merge($bookingTimes, get_time_slot($timeSlot, $split['start'], $split['end']));
        }
        
        // handle times
        if($exceptions){
            return response()->json(['errors' => [__('app.This business is closed on the day of your choice. Please choose another day for appointment')]]);
        }
        if(!$time){
            return response()->json(['errors' => [__('app.Business is closed on this day')]]);
        }

        return response()->json(['data' => $bookingTimes]);


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
