<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('courses',function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->text('desc')->lenght(0);
            $table->integer('amount'); //จำนวนรุ่นที่เปิด
            $table->integer('cost'); //ราคา
            $table->integer('discount')->default(0); //ส่วนลด
            $table->integer('minimum')->default(0); //จำนวนขั้นต่ำ
            $table->integer('status')->default(0);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('courses');
    }
}
