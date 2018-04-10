<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentfmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parentfms', function (Blueprint $table) {
            $table->increments('id');
                 $table->string('name_father');
            $table->string('name_mother');

            $table->string('email_father');
            $table->string('email_mother');

            $table->string('phone_father');
            $table->string('phone_mother');

            $table->boolean('status')->default('1');
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
        Schema::dropIfExists('parentfms');
    }
}
