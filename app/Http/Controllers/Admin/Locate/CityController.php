<?php

namespace App\Http\Controllers\Admin\Locate;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    


    public function searchAjax(Request $request){
        $cities = City::with('province')->where('name', 'LIKE', "%{$request->q}%")->orWhere('id', "{$request->q}")->orWhereHas('province', function($q) use($request){
            return $q->where('name', 'LIKE', "%{$request->q}%");
        })->limit(50)->get();
        return response()->json($cities);
    }
}
