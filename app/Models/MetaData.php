<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaData extends Model
{
    use HasFactory;

    public function prfile_image(){
        return $this->hasOne(Attachment::class, 'meta_value');
    }
}
