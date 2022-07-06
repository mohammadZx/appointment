<?php

require_once __DIR__ . '/operations/action.php';

use App\Models\Attachment;
use App\Models\Listing;
use Hekmatinasser\Verta\Verta;
use Carbon\Carbon;

use function GuzzleHttp\json_decode;

define('PREPAGE', 5);
define('FILTERS', ['service', 'city']);
define('PRICE_UNIT', 'تومان');
define('LOGO', 'http://127.0.0.1:8000/images/logo.png');
define('SOCIAL', [
    [
        'icon' => 'fa fa-instagram' ,
        'name' => 'اینستاگرام',
        'link' => 'https://instagram.com'
    ],
    [
        'icon' => 'fa fa-paper-plane' ,
        'name' => 'تلگرام',
        'link' => 'https://instagram.com'
    ],
    [
        'icon' => 'fa fa-whatsapp' ,
        'name' => 'واتساپ',
        'link' => 'https://instagram.com'
    ],
]);


function clearFormat($data, $status = true){
    if($data == null){
        if($status){
            return Carbon::now();
        }else{
            return null;
        }
    }
    $v = new Verta();
    $date = explode(' ', $data)[0];
    $date = explode('-', $date);
    $org = $v->getGregorian($date[0], $date[1], $date[2]); 
    return implode('-', $org) . " {$v->hour}:{$v->minute}:{$v->second}";
}


function toJalali($date, $delimeter = '-', $concater = '-'){
    return Carbon::parse($date)->toJalali();
}

function toGregorian($date, $delimeter = '-', $concater = '-'){
    $de = explode(' ', Carbon::parse($date)->format('Y-m-d H:i:s'));
    $getData = explode($delimeter, $de[0]);
    $Ndate = Verta::getGregorian((int) $getData[0], (int) $getData[1], (int) $getData[2]);
    $h = isset($de[1]) ? $de[1] : null;
    return implode($concater, $Ndate)  .' ' . $h;

}

$GLOBALS['options'] = [];
function getOptions(){
    $GLOBALS['options'] = \App\Models\Option::all();
}
function getOptionSegment($name){
   $filtered = $GLOBALS['options']->filter(function($value, $key) use($name){
        return $value->option_key == $name;
    });
    
    return \App\Http\Resources\OptionResource::collection($filtered);
}
function getOptionTypes(){
    return \App\Models\Option::groupBy('option_key')->get()->map(function($item){
         $item->label = __('app.'.$item->option_key);
         return $item;
    });
}


function get_image($id){
    $image = Attachment::find($id);
    return $image ? asset('storage/' . $image->src) : null;
}

function get_listing_service_price($service){
    if($service->is_price_from){
        return 'از ' . $service->price . ' ' . PRICE_UNIT;
    }
    return $service->price . ' ' . PRICE_UNIT;
}

function get_user_avatar($image){
    if($image){
        return get_image($image);
    }
    return asset('images/avatar.png');
}

function get_time_slot($interval, $start_time, $end_time, $ignor = 0)
{
    $start = new DateTime($start_time);
    $end = new DateTime($end_time);
    $startTime = $start->format('H:i');
    $endTime = $end->format('H:i');
    $i=0;
    $time = [];
    while(strtotime($startTime) <= strtotime($endTime)){
        $start = $startTime;
        $end = date('H:i',strtotime('+'.$interval.' minutes',strtotime($startTime)));
        $startTime = date('H:i',strtotime('+'.$interval.' minutes',strtotime($startTime)));
        $i++;
        if(strtotime($startTime) <= strtotime($endTime)){
            $time[$i]['time_start'] = $start;
            $time[$i]['time_end'] = $end;
        }
    }
    return $time;
}


function get_splits($removes, $startTime, $endTime){


	if($startTime === $endTime) return [['start' => $startTime, 'end' => $endTime]];
	
	usort($removes, function($r1, $r2){
		$r1 = explode(":", $r1['end']);
		$r1 = intval($r1[0]) * 60 + intval($r1[1]);
		$r2 = explode(":", $r2['end']);
		$r2 = intval($r2[0]) * 60 + intval($r2[1]);
		return $r1 <=> $r2;
	});
	
	$splits = [];
	
	foreach($removes as $r){
		$splits[] = [
			'start' => $startTime,
			'end' => $r['start']
		];
		$startTime = $r['end'];
		if($startTime === $endTime) return $splits;
	}

	return array_merge($splits,[[
			'start' => $startTime,
			'end' => $endTime
		]]);
}

function get_booking_times($date, $services, $listing_id, $appointment_id = null){
    // get dependencies
    $day = strtolower(date('l', strtotime($date))); // get weekday of user selected date
    $listing = Listing::findOrFail($listing_id);
    $exceptions = $listing->exceptions()->where('exception_date',$date )->first();
    $time = $listing->times()->where('week_day', $day)->whereType('main')->first(); //get times in week day for listings
    $timeSlots = $listing->times()->where('week_day', $day)->whereType('slot')->get();
    $services = $listing->services()->whereIn('sub_service_id', $services)->get();
    if($appointment_id){
        $appointments = $listing->appointments()->where('id', '<>', $appointment_id)->where('date_start', 'LIKE', "%{$date}%")->where('status', 'none')->get();
    }else{
        $appointments = $listing->appointments()->where('date_start', 'LIKE', "%{$date}%")->where('status', 'none')->get();
    }
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
        return ['errors' => [__('app.This business is closed on the day of your choice. Please choose another day for appointment')]];
    }
    if(!$time){
        return ['errors' => [__('app.Business is closed on this day')]];
    }

    return ['data' => $bookingTimes];

}

function is_valid_appointment($listing, $services, $date, $start, $end, $appointment_id = null){
    $bookingTimes = get_booking_times($date, $services, $listing, $appointment_id);
    $status = false;
    if(!isset($bookingTimes['data'])) return false;
    foreach($bookingTimes['data'] as $item){
        if($item['time_start'] == $start && $item['time_end'] == $end) $status = true;
    }
    return $status;
}

