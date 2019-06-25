<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    //
    protected $table = 'courses';
    protected $fillable = ['name','desc']; //กำหนดให้สามารถเพิ่มอมูลได้ในคำสั่งเดียว Mass Assignment

    public function enroll(){
        return $this->hasMany(Enroll::class); //กำหนด One to many relation ไปยังตาราง Enroll
    }
}
