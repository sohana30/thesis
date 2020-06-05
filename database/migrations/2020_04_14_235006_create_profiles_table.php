<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('image')->default('card.svg');
            $table->string('fName')->default('Student1');
            $table->string('lName')->default('lastname');
            $table->string('gender')->default('Male');
            $table->bigInteger('pNumber')->unique()->default(123456);
            
            $table->string('email')->unique()->default('Student1@g.com');
            
            $table->string('program')->default('program');
            $table->string('country')->default('NA');
            $table->text('about');
            $table->timestamps();

            
        });
        Schema::table('profiles', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
