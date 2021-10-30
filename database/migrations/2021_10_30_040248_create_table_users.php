<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->tinyInteger('gender')->default(1);
            $table->string('phone');
            $table->string('address')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
