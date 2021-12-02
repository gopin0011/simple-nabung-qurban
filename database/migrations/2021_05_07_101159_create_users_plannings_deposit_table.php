<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersPlanningsDepositTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_plannings_deposit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('users_plannings_id')->unsigned();
            $table->double('nominal');
            $table->boolean('is_delete')->default(false);
            $table->timestamps();
            $table->foreign('users_plannings_id')->references('id')->on('users_plannings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_plannings_deposit');
    }
}
