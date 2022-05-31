<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prefix_name');
            $table->string('name');
            $table->string('surname');
            $table->string('member_type');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('company');
            $table->text('address')->length(0);
            $table->string('districts');
            $table->string('amphures');
            $table->string('provinces');
            $table->string('zipcodes');
            $table->string('telephone');
            $table->rememberToken();
            $table->string('type')->default('default');
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
        Schema::dropIfExists('users');
    }
}
