<?php

namespace App\Http\Controllers\Admin\Locate;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:see_city', ['only' => ['index']]);   
        $this->middleware('can:edit_city', ['only' => ['store']]);   
        $this->middleware('can:delete_city', ['only' => ['destroy']]);    
        $this->middleware('can:insert_city', ['only' => ['store']]);    

    }
    
    public function index(){
        $cities = City::orderBy('id', 'DESC')->paginate(PREPAGE);
        return view('admin.locate.cities', [
            'cities' => $cities
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'province_id' => 'required:exists:provinces,id'
        ]);

        $city = new City();
        if($request->has('city_id')){
            $city = City::findOrFail($request->city_id);
        }

        $city->name = $request->name;
        $city->province_id = $request->province_id;

        $city->save();

        return redirect()->back()->with('message', [
            'type' => 'success',
            'message' => __('app.Item successfully added')
        ]);
    }

    public function destroy(Request $request, City $city){
        $request->validate([
            'city_id' => 'required:exists:cities,id|not_in:' . $city->id
        ]);
        
        $city->listings()->update([
            'city_id' => $request->city_id
        ]);
        
        $city->delete();

        return redirect()->back()->with('message', [
            'type' => 'success',
            'message' => __('app.Item successfully deleted')
        ]);
        
    }
    

    public function searchAjax(Request $request){
        $cities = City::with('province')->where('name', 'LIKE', "%{$request->q}%")->orWhere('id', "{$request->q}")->orWhereHas('province', function($q) use($request){
            return $q->where('name', 'LIKE', "%{$request->q}%");
        })->limit(50)->get();
        return response()->json($cities);
    }
}
