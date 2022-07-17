<?php

namespace App\Http\Controllers\Admin\Appointment;

use App\Enums\AppointmentStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Rules\IsValidBookingTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Enum;

class AppointmentController extends Controller
{
    public function index(){
        $appointments = Appointment::orderBy('id', 'DESC')->paginate(PREPAGE);
        $cases = AppointmentStatusEnum::cases();
        return view('admin.appointment.index', [
            'appointments' => $appointments,
            'cases' => $cases
        ]);
    }

    public function edit(Appointment $appointment)
    {
        return view('admin.appointment.add-or-edit', [
            'appointment' => $appointment,
            'listing' => $appointment->listing,
        ]);
    }

    public function update(Request $request, Appointment $appointment){

        $allReq = $request->all();
        $allReq['date'] = date('Y-m-d', strtotime(toGregorian($request->date)));
        $allReq['appointment_id'] = $appointment;

        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'service' => 'required',
            'time_slot' => ['required' , new IsValidBookingTime($allReq)],
            'listing_id' => 'required'
        ]);

        $validator->validate();
        $request->date = date('Y-m-d', strtotime(toGregorian($request->date)));

        list($start, $end) = explode('|', $request->time_slot);
        $appointment->listing_id = $request->listing_id;
        if(!$request->has('name') && !$request->has('phone')) $appointment->user_id = auth()->user()->id;
        if($request->has('user_id')) $appointment->user_id = $request->user_id;
        if($request->has('name')) $appointment->name = $request->name;
        if($request->has('phone')) $appointment->phone = $request->phone;
        
        $appointment->date_start = $request->date . ' ' . $start .':00';
        $appointment->date_end = $request->date . ' ' . $end .':00';
        $appointment->status = AppointmentStatusEnum::NONE;
        if($request->has('status')) $request->status = $request->status;
        $appointment->save();
        $appointment->subServices()->sync($request->service);
        return redirect()->back()->with('message', [
            'type' => 'success',
            'message' =>  __('app.Your appointment has been successfully registered. Please show up on time')
        ]);

    }

    public function destroy(Appointment $appointment){
        $appointment->delete();
        return redirect()->back()->with('message' , [
            'type' => 'success',
            'message' => 'مورد با موفقیت حذف شد'
        ]);
    }

    public function changestatus(Request $request, Appointment $appointment){
        $request->validate([
            'status' => ['required', new Enum(AppointmentStatusEnum::class)]
        ]);
        $appointment->status = $request->status;
        $appointment->save();
        return redirect()->back()->with('message' , [
            'type' => 'success',
            'message' => 'مورد با موفقیت ویرایش شد'
        ]);
    }
}
