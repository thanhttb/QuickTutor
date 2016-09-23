<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')
            $table->string('name',100);
            $table->string('email');
            $table->string('phone1');
            $table->string('phone2');
            $table->char('gender',2);
            $table->date('birth');
            $table->string('fb');
            $table->string('job');
            $table->string('street');
            $table->string('district');
            $table->string('city');
            $table->string('school');
            $table->string('spare_time');
            $table->text('description');
            $table->string('avatar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profile');
    }
}
