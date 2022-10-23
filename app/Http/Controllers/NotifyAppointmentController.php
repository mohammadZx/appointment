<?php

namespace App\Http\Controllers;

use App\Enums\AppointmentStatusEnum;
use App\Models\Appointment;
use App\Options\Sms\BaseSms;
use Illuminate\Http\Request;

class NotifyAppointmentController extends Controller
{
    public function index(){
        $appointments = Appointment::whereRaw("
            DATE_FORMAT(date_start, '%Y%-%m%-%d% %H%:%i') = DATE_FORMAT(
                DATE_SUB(
                    DATE_FORMAT(NOW(), '%Y%-%m%-%d% %H%:%i'),
                    INTERVAL - remember_time MINUTE),
                    '%Y%-%m%-%d% %H%:%i'
                )

        ")->get();

          foreach($appointments as $appointment){
            if($appointment->name && $appointment->phone){
                $sms = BaseSms::sms('ghasedak')->sendByBodyId($appointment->phone, 'remember', "{$appointment->name};{$appointment->listing->name};{$appointment->date_start}");
            }else{
                $sms = BaseSms::sms('ghasedak')->sendByBodyId($appointment->user->phone, 'remember', "{$appointment->user->name};{$appointment->listing->name};{$appointment->date_start}");
            }
        }


        // Notify now

        // get the appoitments that on here
        $appointments = Appointment::whereRaw("
            DATE_FORMAT(date_start, '%Y%-%m%-%d% %H%:%i') = DATE_FORMAT(NOW(), '%Y%-%m%-%d% %H%:%i')
        ")->get();

        foreach($appointments as $appointment){
            // check is frist on day or not
            $dd = $appointment->date_end->format('Y-m-d');
            $beforeAppoitntment = Appointment::where('date_end' , '<=', toGregorian($appointment->date_start))
            ->where('date_start', 'LIKE', "%$dd%")
            ->where('id', '<>', $appointment->id)
            ->first();

            $status = false;

            if(!$beforeAppoitntment){
                $status = true;
            }elseif($beforeAppoitntment->status == AppointmentStatusEnum::FINISH){
                $status = true;
            }else{
                $status = false;
            }

            if(!$appointment->getMeta('send_its_time_sms', true) && $status){
                if($appointment->name && $appointment->phone){
                  $sms = BaseSms::sms('ghasedak')->sendByBodyId($appointment->phone, 'ontime', "{$appointment->name};{$appointment->listing->name}");
              }else{
                  $sms = BaseSms::sms('ghasedak')->sendByBodyId($appointment->user->phone, 'ontime', "{$appointment->user->name};{$appointment->listing->name}");
              }
          }
        }

    
    }


}