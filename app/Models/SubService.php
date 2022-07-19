<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
    use HasFactory;

    protected $fillable = ['service_id', 'title','content'];

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function appointments(){
        return $this->morphedByMany(Appointment::class, 'target', 'relationships');
    }

    public function listings(){
        return $this->hasMany(ListingService::class);
    }
}
