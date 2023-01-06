<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('username')->primary();
            $table->string('password');
            $table->string('fullname');
            $table->string('email');
            $table->string('number_telephone');
            $table->string('address');
            $table->date('birthday');
            $table->integer('level');
            $table->integer('confirm');
            $table->string('confirmation_code')->nullable();
            $table->rememberToken();
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
