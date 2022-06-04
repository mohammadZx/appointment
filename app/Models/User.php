<?php

namespace App\Models;

use App\Meta\MetaAble;
use App\Options\DateStructure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, DateStructure, MetaAble;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role(){
        $role = $this->getMeta('role', true);
        if(!$role || !$opiton = Option::find($role)) return null;
        return $opiton;
     }
 
     public function hasAnyPermission($roles){
         if(!$this->role()) return false;
         if($this->role()->permissions()->whereIn('option_value', $roles)->first()) return true;
         return false;
     }
     
     public function hasPermission($role){
        if(!$this->role()) return false;
        if($this->role()->permissions()->where('option_value', $role)->first()) return true;
        return false;
     }
}
