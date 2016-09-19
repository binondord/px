<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is18age');
            $table->boolean('isGEDcompleted');
            $table->boolean('isGreenCardHolder');
            $table->boolean('done473BatteryExam');
            $table->boolean('done473CExam');
            $table->boolean('done460BatteryExam');
            $table->string('email');
            $table->string('first');
            $table->string('last');
            $table->string('phone');
            $table->string('city');
            $table->integer('state_id');
            $table->integer('country_id');
            $table->string('zip');
            $table->integer('birthyear');
            $table->boolean('status');
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
        Schema::drop('submissions');
    }
}
