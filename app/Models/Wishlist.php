<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = ['wishlistable_id', 'wishlistable_type'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function wishlistable(){
        return $this->morphTo();
    }
}
