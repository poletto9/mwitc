<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'default';
    public function isAdmin(){
        return $this->type === self::ADMIN_TYPE;
    }

    public function Enroll(){
        return $this->hasMany(Enroll::class); //กำหนด One to many relation ไปยังตาราง Enroll
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'prefix_name','name','surname','member_type','email','password','company','address','districts','amphures','provinces','zipcodes','telephone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
