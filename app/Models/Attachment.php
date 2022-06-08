<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;


    public function user(){
        return $this->belongsTo(MetaData::class, 'meta_value')->where('meta_key', 'profile_image');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'thumbnail_id');
    }

    public function service(){
        return $this->belongsTo(Service::class, 'thumbnail_id');
    }
}
