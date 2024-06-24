<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageTable extends Migration
{
    public function up()
    {
        Schema::create('message', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->foreignUlid('from')->references('id')->on('users')->onDelete('cascade');
            //->constrained('users');

            $table->foreignUlid('to')->references('id')->on('users')->onDelete('cascade');
            //->constrained('users');

            $table->string('title');
            $table->integer('isred');
            $table->longText('message');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('message');
    }
}
