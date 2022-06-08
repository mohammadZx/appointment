<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function exceptions(){
        return $this->hasMany(ListingException::class);
    }

    public function times(){
        return $this->hasMany(ListingTime::class);
    }

    public function services(){
        return $this->hasMany(ListingService::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }
}
