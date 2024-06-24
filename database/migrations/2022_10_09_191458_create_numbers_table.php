<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNumbersTable extends Migration
{
    public function up()
    {
        Schema::create('numbers', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('img');
            $table->string('title');
            $table->string('number');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('numbers');
    }
}
