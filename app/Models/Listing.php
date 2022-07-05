<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Meta\MetaAble;
use App\Options\DateStructure;
use App\Options\OnDeleteDependency;

class Listing extends Model
{
    use HasFactory, MetaAble, DateStructure, OnDeleteDependency;
    public static $onDeletes = ['comments', 'exceptions', 'times', 'services', 'appointments'];
    protected $fillable = ['user_id', 'service_id', 'name', 'city_id', 'address', 'status', 'content'];

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

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }

    public function wishlists(){
        return $this->morphMany(Wishlist::class, 'wishlistable');
    }

}
