<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrollDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('enroll_detail',function (Blueprint $table){
            $table->increments('reg_id');
            $table->integer('enroll_id')->unsigned();
            $table->foreign('enroll_id')->references('enroll_id')->on('enroll');
            $table->string('prefix_name');
            $table->string('name');
            $table->string('surname');
            $table->string('position');
            $table->string('food');
            $table->string('telephone');
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
        Schema::dropIfExists('enroll_detail');
    }
}
