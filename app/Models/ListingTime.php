<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id',
        'time_start',
        'time_end',
        'week_day'
    ];
    public $timestamps = false;

    public function listing(){
        return $this->belongsTo(Listing::class);
    }
}
