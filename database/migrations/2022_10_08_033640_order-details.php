<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->integer('IDorder')->length(20)->unsigned();
            $table->integer('price');
            $table->integer('amountdetail');
            $table->foreign('IDorder')->references('IDorder')->on('order');
            $table->integer('IDproduct')->length(20)->unsigned();
            $table->foreign('IDproduct')->references('IDproduct')->on('product');

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
        //
    }
}
