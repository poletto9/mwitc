<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    //
    protected $table = 'enroll';
    protected $fillable = ['batch_id','user_id']; //กำหนดให้สามารถเพิ่มอมูลได้ในคำสั่งเดียว Mass Assignment

    public function Batches(){
        return $this->belongsTo(Batches::class,'batch_id'); //กำหนด FK ให้ตาราง Enroll
    }

    public function User(){
        return $this->belongsTo(User::class,'user_id'); //กำหนด FK ให้ตาราง Enroll
    }

    public function EnrollDetail(){
        return $this->hasMany(EnrollDetail::class); //กำหนด One to Many relation ไปยังตาราง EnrollDetail
    }
}
