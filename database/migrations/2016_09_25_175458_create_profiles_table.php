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

            $table->integer('user_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone1');
            $table->string('phone2');
            $table->string('facebook');
            $table->string('gender');
            $table->date('birthday');
            $table->string('job');
            $table->string('address');
            $table->string('school');
            $table->string('bio');
            $table->string('linkAvatar');
            $table->string('linkVideo');
            $table->boolean('active')->default(1);
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
