<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImportDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import-details', function (Blueprint $table) {
            
            $table->integer('IDimport')->length(20)->unsigned();
            $table->integer('IDproduct')->length(20)->unsigned();
             $table->foreign('IDproduct')->references('IDproduct')->on('product');
             $table->foreign('IDimport')->references('IDimport')->on('import');

            $table->integer('price');
            $table->integer('amount');
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
