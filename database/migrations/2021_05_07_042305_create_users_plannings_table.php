<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUsersPlanningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_plannings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('plans_id')->unsigned();
            $table->string('plans', 100);
            $table->double('price');
            $table->text('description');
            $table->bigInteger('users_id')->unsigned();
            $table->timestamps();
            $table->foreign('plans_id')->references('id')->on('plans');
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_plannings');
    }
}
