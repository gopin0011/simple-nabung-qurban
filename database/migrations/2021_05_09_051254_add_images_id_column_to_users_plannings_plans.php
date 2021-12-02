<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImagesIdColumnToUsersPlanningsPlans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('users_plannings', function (Blueprint $table) {
            $table->bigInteger('images_id')->unsigned();
            $table->foreign('images_id')->references('id')->on('images')->onDelete('cascade');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_plannings', function (Blueprint $table) {
            //
        });
    }
}
