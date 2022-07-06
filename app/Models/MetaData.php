<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaData extends Model
{
    use HasFactory;

    protected $fillable = ['meta_key', 'meta_value', 'parent_id', 'obj_id', 'obj_type'];
    public function prfile_image(){
        return $this->hasOne(Attachment::class, 'meta_value');
    }
}
