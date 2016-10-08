<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
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

            $table->integer('user_id')->unsigned();
            $table->integer('city_id')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->string('email')->default("email@example.com");
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('facebook')->default("https://www.facebook.com/");
            $table->string('gender')->nullable();
            $table->timestamp('birthDay')->nullable();
            $table->string('job')->nullable();
            $table->string('address')->nullable();
            $table->string('school')->nullable();
            $table->string('bio')->nullable();
            $table->string('linkAvatar')->nullable();
            $table->string('linkVideo')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('price')->unsigned()->default(100000);
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
        Schema::dropIfExists('profiles');
    }
}
