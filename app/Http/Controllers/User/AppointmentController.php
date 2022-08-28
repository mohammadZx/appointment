<?php

namespace App\Http\Controllers\User;

use App\Enums\AppointmentStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Options\Sms\BaseSms;
use App\Rules\IsValidBookingTime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
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
        $date = date('Y-m-d');

        $dateBooks = Appointment::selectRaw('DATE_FORMAT(appointments.date_start, "%Y-%m-%d") as date ,sub_services.title as title, count(*) as count ')
        ->leftJoin('relationships', 'appointments.id', '=' , 'relationships.obj_id')
        ->leftJoin('sub_services', 'relationships.target_id', '=' , 'sub_services.id')
        ->whereRaw("DATE_FORMAT(appointments.date_start, '%Y-%m-%d') >= '$date'")
        ->where('relationships.target_type', 'App\Models\Appointment')
        ->whereHas('listing', function($q) use($user){
            $q->where('listings.user_id', $user->id);
        })
        ->groupByRaw('DATE_FORMAT(appointments.date_start, "%Y-%m-%d"), sub_services.title')
        ->orderBy('appointments.date_start', 'ASC')->get();


        if(!request()->has('stauts') && !request()->has('date')){
            
            $pipelines = Appointment::query()->where('date_start', 'LIKE', "%{$date}%");
        }else{
                $pipelines = app(Pipeline::class)
                ->send(Appointment::query())
                ->through([
                    new \App\QueryFilters\AptDate(Appointment::class),
                    new \App\QueryFilters\AptStatus(Appointment::class),
                ])
                ->thenReturn();
        }
        

        $appointments = $pipelines->whereHas('listing', function($q) use($user){
            $q->where('listings.user_id', $user->id);
        })->orderByRaw('ABS(DATEDIFF(date_start, NOW()))')->paginate(PREPAGE);

        $appointments->appends(request()->query());
        return view('user.appointments', [
            'appointments' => $appointments,
            'dateBooks' => $dateBooks
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
        // get Diffrent between the appoitment finished time and now to handle some operation
        $minutes = date_diff_minut($appointment->date_end, date('Y-m-d H:i:s'));
    
        // change appointment status
        $appointment->status = 'finish';
        $appointment->save();

        // send sms to booking owner for time comming if listing owner want
        if($request->send_time_sms) $this->notifyTime($appointment);
        

        // Default set late to other in minutes
        if($request->muchlate && $request->muchlate >= 0){

            $this->changeTimesForOtherAppointment($appointment, $request->muchlate);
            return redirect()->back()->with('message', [
                'type' => 'success',
                'message' => __('app.Item successfully updated')
            ]);
        }


        // Default change all time lates for next bookings in a listing
        if(!$request->inform_other && $minutes > 0){

            $this->changeTimesForOtherAppointment($appointment, $minutes);
            return redirect()->back()->with('message', [
                'type' => 'success',
                'message' => __('app.Item successfully updated')
            ]);
        }


        // Change time if listing owner want to customize
        if($minutes > 0){
            // $appointmentToNotify = $appointment->listing->appointments()->whereIn('status', [AppointmentStatusEnum::NONE, AppointmentStatusEnum::APPROVE])
            // ->where('date_start' , '>' , date('Y-m-d H:i:s'))
            // ->where('id' , '<>' , $appointment->id)
            // ->limit($request->much > 1 ? $request->much : 1)
            // ->get();

            // foreach($appointmentToNotify as $apt){
            //     if(!$apt->getMeta('late_origin_date', true)) $apt->setMeta('late_origin_date',  $apt->date_start .'|'. $apt->date_end , 0, true);
            //     $apt->update([
            //         'date_start' => toGregorian($apt->date_start->addMinutes($minutes)->format('Y-m-d H:i:s')) ,
            //         'date_end' => $apt->date_end->addMinutes($minutes)->format('Y-m-d H:i:s')
            //     ]);
            // }

        }


        return redirect()->back()->with('message', [
            'type' => 'success',
            'message' => __('app.Item successfully updated')
        ]);

    }


    /**
     *  Recursive function to change start and end time with consider free time between to appointment
     *  @steps
     *   1- get appoitnment and sum date end and date diff in minut
     *   2- get the appoitnment where the date start < those date in {1}
     *   3- if exsit anythis, that mean, must change the date start and date end
     *   4- mins free time between this appointment and the appoinment in {3}
     *   5- update in repeat this functionality
     * 
     *  @param object $appointment
     *  @param integer $minutes
     */
    public function changeTimesForOtherAppointment($appointment, $minutes, $before = []){
        $date = $appointment->date_end->addMinutes($minutes)->format('Y-m-d H:i:s');
        $dd = $appointment->date_end->addMinutes($minutes)->format('Y-m-d');
        $before[] = $appointment->id;

        $appointmentToChange = $appointment->listing->appointments()->whereIn('status', [AppointmentStatusEnum::NONE, AppointmentStatusEnum::APPROVE])
            ->where('date_start' , '<' , $date)
            ->where('date_start' , 'LIKE' , "%{$dd}%")
            ->whereNotIn('id' , $before)
            ->first();

        if($appointmentToChange){
            // $minutes -= date_diff_minut(
            //     $appointment->date_end->addMinutes($minutes)->format('Y-m-d H:i:s'),
            //     toGregorian($appointmentToChange->date_start)
            // );
    
            if(!$appointmentToChange->getMeta('late_origin_date', true)) $appointmentToChange->setMeta('late_origin_date',  $appointmentToChange->date_start .'|'. $appointmentToChange->date_end , 0, true);
            $appointmentToChange->update([
                'date_start' => toGregorian($appointmentToChange->date_start->addMinutes($minutes)->format('Y-m-d H:i:s')) ,
                'date_end' => $appointmentToChange->date_end->addMinutes($minutes)->format('Y-m-d H:i:s')
            ]);

            $this->changeTimesForOtherAppointment($appointmentToChange, $minutes, $before);
        }
    }


    /**
     * send sms to next appointment
     * @param object $appointment
     */
    public function notifyTime($appointment){
        $appointmentToNotify =$appointment->listing->appointments()->where('status', AppointmentStatusEnum::NONE)
        ->where('date_start' , '>=' , $appointment->date_end)
        ->first();

        if($appointmentToNotify){
            if($appointmentToNotify->name && $appointmentToNotify->phone){
                $sms = @BaseSms::sms('melipayamak')->sendByBodyId($appointmentToNotify->phone, 96043, "{$appointmentToNotify->name};{$appointmentToNotify->listing->name}");
            }else{
                $sms = @BaseSms::sms('melipayamak')->sendByBodyId($appointmentToNotify->user->phone, 96043, "{$appointmentToNotify->user->name};{$appointmentToNotify->listing->name}");
            }
            
            $appointmentToNotify->setMeta('send_its_time_sms', true, 0, true);
        }
    }


    public function takeGap(Request $request){
        $request->validate([
            'minutes' => 'required|min:1'
        ]);
        $user = auth()->user();


        $appointment= Appointment::whereIn('status', [AppointmentStatusEnum::NONE, AppointmentStatusEnum::APPROVE])
        ->where('date_start' , '>' , date('Y-m-d H:i:s'))
        ->whereHas('listing', function($q) use($user){
            $q->where('listings.user_id', $user->id);
        })
        ->orderByRaw('ABS(DATEDIFF(date_start, NOW()))')
        ->first();


        $appointment->update([
            'date_start' => toGregorian($appointment->date_start->addMinutes($request->minutes)->format('Y-m-d H:i:s')) ,
            'date_end' => $appointment->date_end->addMinutes($request->minutes)->format('Y-m-d H:i:s')
        ]);
        
        $this->changeTimesForOtherAppointment($appointment, $request->minutes);
        return redirect()->back()->with('message', [
            'type' => 'success',
            'message' => __('app.The gap successfully added')
        ]);

    }

}
