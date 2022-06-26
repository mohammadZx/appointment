<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingException extends Model
{
    use HasFactory;
    protected $fillable = ['listing_id', 'exception_date'];
    public $timestamps = false;

    public function listing(){
        return $this->belongsTo(Listing::class);
    }
}
