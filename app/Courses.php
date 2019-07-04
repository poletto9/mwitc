<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    //
    protected $table = 'courses';
    protected $fillable = ['name','desc','amount','cost']; //กำหนดให้สามารถเพิ่มอมูลได้ในคำสั่งเดียว Mass Assignment

    public function Batches(){
        return $this->hasMany(Batches::class);
    }

}
