<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingService extends Model
{
    use HasFactory;

    protected $fillable = ['listing_id', 'sub_service_id', 'capacity', 'time', 'price', 'is_price_from'];
    public $timestamps = false;

    public function listing(){
        return $this->belongsTo(Listing::class);
    }

    public function subService(){
        return $this->belongsTo(SubService::class);
    }
}
