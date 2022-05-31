<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Batches extends Model
{
    //
    protected $table = 'batches';
    protected $fillable = ['course_id','batch_name','start_reg','end_reg','training_date','batch_type','place']; //กำหนดให้สามารถเพิ่มอมูลได้ในคำสั่งเดียว Mass Assignment

    public function Courses(){
        return $this->belongsTo(Courses::class,'course_id');
    }

    public function Enroll(){
        return $this->hasMany(Enroll::class);
    }

    public function updateById($id, $data = array())
    {
        return DB::table('batches')->where('batch_id', '=', $id)->update($data);
    }

}
