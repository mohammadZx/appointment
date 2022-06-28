<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'title','content', 'icon', 'thumbnail_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function thumbnail(){
        return $this->hasOne(Attachment::class, 'thumbnail_id');
    }

    public function subservices(){
        return $this->hasMany(SubService::class);
    }

    public function listings(){
        return $this->hasMany(listings::class);
    }
}
