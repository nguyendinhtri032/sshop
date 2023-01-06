<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('IDorder');
            $table->integer('total');
            $table->string('username');
            $table->foreign('username')->references('username')->on('users');
            $table->string('pay');
            $table->string('description');
            $table->timestamps();
            $table->string('status_order');
            
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
