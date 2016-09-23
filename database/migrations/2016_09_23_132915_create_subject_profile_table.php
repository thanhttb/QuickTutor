<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_id');
            $table->integer('profile_id');
            $table->string('class');
            $table->string('tuition');
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
        Schema::drop('subject_profile');
    }
}
