<?php

namespace App\Models;

use App\Enums\AppointmentStatusEnum;
use App\Meta\MetaAble;
use App\Options\OnDeleteDependency;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory, MetaAble;

    protected $fillable = ['listing_id', 'user_id', 'name', 'phone', 'date_start', 'date_end', 'status', 'remember_time'];
    protected $dates = ['date_start', 'date_end'];
    protected $casts = [
        'status' => AppointmentStatusEnum::class
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function subServices(){
        return $this->morphToMany(SubService::class, 'target', 'relationships', 'obj_id', 'target_id');
    }

    public function listing(){
        return $this->belongsTo(Listing::class);
    }

    public function dateStart() :Attribute{
        return Attribute::make(
            get: fn($val) => toJalali($val)
        );
    }
}
