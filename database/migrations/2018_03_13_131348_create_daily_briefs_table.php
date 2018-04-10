<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyBriefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_briefs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('food');
            $table->string('activities');
            $table->string('learn');
            $table->integer('period_sleep');
            $table->integer('period_active');
            $table->integer('id_kid');
            $table->date('daily_date');

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
        Schema::dropIfExists('daily_briefs');
    }
}
