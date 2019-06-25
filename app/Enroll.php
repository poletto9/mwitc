<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    //
    protected $table = 'enroll';
    protected $fillable = ['course_id','user_id','name','company','address','postcode','telephone','email']; //กำหนดให้สามารถเพิ่มอมูลได้ในคำสั่งเดียว Mass Assignment

    public function courses(){
        return $this->belongsTo(courses::class,'course_id'); //กำหนด FK ให้ตาราง Enroll
    }

    public function user(){
        return $this->belongsTo(user::class,'user_id'); //กำหนด FK ให้ตาราง Enroll
    }
}
