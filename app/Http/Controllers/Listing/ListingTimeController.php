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
        $times = $listing->times()->where('week_day', $day)->get(); //get times in week day for listings
        $services = $listing->services()->whereIn('id', $request->services)->get();
        $appointments = $listing->appointments()->where('date_start', 'LIKE', "%{$request->date}%");
        $timeSlot = 0;
        $timeSlots = [];

        // get services times
        foreach($services as $service){
            $timeSlot += $service->time;
        }

        // get weekday workour
        foreach($times as $time){
            $timeSlots[] = [
                'start' => $time->time_start,
                'end' => $time->time_end,
            ];
        }

        // calc minuts every appointment in request date and save in $captures
        $capture = [];
        foreach($appointments as $appointment){
            
        }
        

        // handle times
        if($exceptions){
            return response()->json(['errors' => [__('app.This business is closed on the day of your choice. Please choose another day for appointment')]]);
        }




    }

    public function checkTime(Request $request){

    }

    public static function isListingOpenNow($listing){
        $weekday = strtolower(date('l'));
        $time = date('H:i');
        $date = date('Y-m-d');
        $time = $listing->times()->where('week_day', $weekday)->where('time_start', '<=', $time)->where('time_end', '>=', $time)->first();
        $exception = $listing->exceptions()->where('exception_date', $date)->first();
        if($exception || !$time) return false;
        return true;
    }
}
