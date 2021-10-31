<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTours extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('destination_id');
            $table->integer('category_id');
            $table->string('name');
            $table->tinyInteger('status')->default(1);
            $table->text('desciption')->nullable();
            $table->float('price');
            $table->float('sale_price');
            $table->date('start_day');
            $table->integer('date');
            $table->integer('max_member');
            $table->integer('min_member');
            $table->string('image');
            $table->softDeletes();

            $table->timestamps();
            $table->foreign('destination_id')->references('id')->on('destinations');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tours');
    }
}
