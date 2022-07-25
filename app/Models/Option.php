<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;


    public function permissions(){
        return $this->morphToMany(Option::class, 'target', 'relationships', 'obj_id', 'target_id');
    }
}
