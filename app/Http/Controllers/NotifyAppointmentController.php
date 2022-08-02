<?php

namespace App\Http\Controllers;

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
            }
        ")->get();
    
    }


}