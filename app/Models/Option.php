<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;


    public function permissions(){
        return $this->morphToMany('App\Models\Option', 'obj', 'relationships', 'obj_id', 'obj_target');
    }
}
