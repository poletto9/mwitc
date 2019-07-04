<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnrollDetail extends Model
{
    //
    protected $table = 'enroll_detail';
    protected $fillable = ['enroll_id','name','position','food','telephone']; //กำหนดให้สามารถเพิ่มอมูลได้ในคำสั่งเดียว Mass Assignment

    public function Enroll(){
        return $this->belongsTo(Enroll::class,'enroll_id'); //กำหนด FK ให้ตาราง EnrollDetail
    }

}
