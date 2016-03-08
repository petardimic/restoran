<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps('created_at');
            $table->mediumText('name');
            $table->float('price');
            $table->boolean('is_client_recipe')->default(TRUE);
            $table->boolean('is_static')->default(TRUE);
            $table->string('image','100')->nullable();
            $table->integer('restoraunt_id')->unsigned();
            $table->mediumText('description');
            $table->foreign('restoraunt_id')->references('id')->on('restoraunts');

        });

        Schema::table('components', function (Blueprint $table){
            $table->integer('menu_id')->unsigned();
            $table->foreign('menu_id')->references('id')->on('menu');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menu');
    }
}
