<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    //
    protected $table = 'courses';
    protected $fillable = ['name','desc']; //กำหนดให้สามารถเพิ่มอมูลได้ในคำสั่งเดียว Mass Assignment
}
