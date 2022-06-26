<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['listing_id', 'user_id', 'name', 'phone', 'date_start', 'date_end', 'status'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function subServices(){
        return $this->morphToMany(SubService::class, 'target', 'relationships');
    }
}
