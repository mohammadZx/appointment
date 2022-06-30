<?php

namespace App\Models;

use App\Meta\MetaAble;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, MetaAble;

    protected $fillable = ['title','content', 'icon', 'thumbnail_id'];

    public function services(){
        return $this->hasMany(Service::class);
    }

    public function thumbnail(){
        return $this->hasOne(Attachment::class, 'thumbnail_id');
    }

    public function listings()
    {
        return $this->hasManyThrough(Listing::class, Service::class);
    }
}
