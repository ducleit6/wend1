<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRatings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('tour_id');
            $table->integer('services')->default(5);
            $table->integer('hospitality')->default(5);
            $table->integer('cleanliness')->default(5);
            $table->integer('rooms')->default(5);
            $table->integer('comfort')->default(5);
            $table->integer('satisfaction')->default(5);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tour_id')->references('id')->on('tours');
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
        Schema::dropIfExists('ratings');
    }
}
