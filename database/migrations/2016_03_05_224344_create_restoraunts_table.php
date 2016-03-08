<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestorauntsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restoraunts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('created_on');
            $table->string('name',150);
            $table->string('address',300);
            $table->string('phone',20);
            $table->time('open_at');
            $table->time('close_at');
        });

        Schema::table('users', function(Blueprint $table){
            $table->integer('restoraunt_id')->nullable()->unsigned();
            $table->foreign('restoraunt_id')->references('id')->on('restoraunts');
        });
        Schema::table('orders', function(Blueprint $table){
            $table->integer('restoraunt_id')->nullable()->unsigned();
            $table->foreign('restoraunt_id')->references('id')->on('restoraunts');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('restoraunts');
    }
}
