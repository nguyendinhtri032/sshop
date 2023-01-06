<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
        $table->increments('IDproduct');
        $table->string('name');
        $table->integer('amount');
        $table->integer('price');
        $table->string('description');
        $table->string('size');
        $table->string('defaultimage');
        $table->integer('IDpromotion')->length(20)->unsigned();
        $table->integer('IDcategory')->length(20)->unsigned();

        $table->integer('IDsupplier')->length(20)->unsigned();
        $table->foreign('IDsupplier')->references('IDsupplier')->on('supplier');
        
        $table->foreign('IDpromotion')->references('IDpromotion')->on('promotion');
        $table->foreign('IDcategory')->references('IDcategory')->on('category');
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
