<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kids', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('birth_date');
            $table->string('other_gardian_name')->default('xxxx');
            $table->string('other_gardian_phone')->default('xx-xxxxxx');
            $table->string('food_preference')->default('xxxx');
            $table->string('allergies')->default('xxxx');
            $table->string('medical_condition')->default('xxxx');
            $table->string('img_profile')->default('xxxx');
            $table->string('url_profile')->default('male');
            $table->integer('weight')->default('40');
            $table->integer('height')->default('150');
            $table->string('gender')->default('male');
            $table->string('personality_note')->default('xxxx');
            $table->date('registration_date');
            $table->string('active')->default('xxxx');
            $table->boolean('status')->default('1');
            $table->integer('id_parent')->default('0');;
            $table->integer('id_group')->default('0');

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
        Schema::dropIfExists('kids');
    }
}
