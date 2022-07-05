<?php

namespace App\Enums;

enum AppointmentStatusEnum:string
{
    case NONE = 'none';
    case APPROVE = 'approve';
    case LATE = 'late';
    case FINISH = 'finish';
}