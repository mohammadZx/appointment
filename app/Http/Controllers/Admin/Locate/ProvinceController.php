<?php

namespace App\Http\Controllers\Admin\Locate;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index(){
        $provinces = Province::orderBy('id', 'DESC')->paginate(PREPAGE);
        return view('admin.locate.provinces', [
            'provinces' => $provinces
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);
        $province = new Province();
        if($request->has('province_id')){
            $province = Province::findOrFail($request->province_id);
        }

        $province->name = $request->name;
        $province->save();

        return redirect()->back()->with('message', [
            'type' => 'success',
            'message' => __('app.Item successfully added')
        ]);
    }

    public function destroy(Request $request, Province $province){
        $request->validate([
            'province_id' => 'required:exists:provinces,id'
        ]);
        
        $province->cities()->update([
            'province_id' => $request->province_id
        ]);
        
        $province->delete();

        return redirect()->back()->with('message', [
            'type' => 'success',
            'message' => __('app.Item successfully deleted')
        ]);
        
    }


    public function searchAjax(Request $request){
        $provinces = Province::where('name', 'LIKE', "%{$request->q}%")->orWhere('id', "{$request->q}")->limit(50)->get();
        return response()->json($provinces);
    }
}
