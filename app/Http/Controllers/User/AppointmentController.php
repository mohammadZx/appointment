<?php

namespace App\Http\Controllers\User;

use App\Enums\AppointmentStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Options\Sms\BaseSms;
use App\Rules\IsValidBookingTime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Facades\Validator;
class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $appointments = $user->appointments()->orderBy('id', 'DESC')->paginate(PREPAGE);
        $cases = AppointmentStatusEnum::cases();
        return view('user.appointments', [
            'appointments' => $appointments,
            'cases' => $cases
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        return view('user.update-appointment', [
            'appointment' => $appointment,
            'listing' => $appointment->listing
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
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

    public function finish(Request $request, Appointment $appointment){
        $appointment->status = 'finish';
        $appointment->save();

        if(!$request->inform_other) return redirect()->back()->with('message', [
            'type' => 'success',
            'message' => __('app.Item successfully updated')
        ]);

        $number = $request->much > 1 ? $request->much : 1;


        $start_date = new \DateTime($appointment->date_end);
        $since_start = $start_date->diff(new \DateTime(date('Y-m-d H:i:s')));
        $date = date('Y-m-d');

        $minutes = $since_start->days * 24 * 60;
        $minutes += $since_start->h * 60;
        $minutes += $since_start->i;
        


        $listing = $appointment->listing;
        
        $appointmentToNotify = $listing->appointments()->where('status', AppointmentStatusEnum::NONE)
        ->where('date_start' , '>' , $date)
        ->where('date_start', 'LIKE', "%%")
        ->limit($number)
        ->get();

        

        foreach($appointmentToNotify as $apt){
            $apt->update([
                'date_start' => toGregorian($apt->date_start->addMinutes($minutes)->format('Y-m-d H:i:s')) ,
                'date_end' => $apt->date_end->addMinutes($minutes)->format('Y-m-d H:i:s')
            ]);

            if($apt->name && $apt->phone){
                $sms = BaseSms::sms('melipayamak')->sendByBodyId($apt->phone, 95447, "{$apt->name};{$apt->listing->name};{$apt->date_start}");
            }else{
                $sms = BaseSms::sms('melipayamak')->sendByBodyId($apt->user->phone, 95447, "{$apt->user->name};{$apt->listing->name};{$apt->date_start}");
            }
        }

        return redirect()->back()->with('message', [
            'type' => 'success',
            'message' => __('app.Item successfully updated')
        ]);

    }
}
