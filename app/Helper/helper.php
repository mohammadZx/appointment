<?php

require_once __DIR__ . '/operations/action.php';

use App\Models\Attachment;
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
     $date = date('Y-m-d H:i', strtotime($date));
    $getData = explode($delimeter, explode(' ', $date)[0]);
    $Ndate = Verta::getJalali($getData[0], $getData[1], $getData[2]);
    return implode($concater, $Ndate)  .' ' . explode(' ', $date)[1];
}

function toGregorian($date, $delimeter = '-', $concater = '-'){
    $de = explode(' ', Carbon::parse($date)->format('Y-m-d H:i:s'));
    $getData = explode($delimeter, $de[0]);
    $Ndate = Verta::getGregorian($getData[0], $getData[1], $getData[2]);
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
        get_image($image);
    }
    return asset('images/avatar.png');
}