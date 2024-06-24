<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustmerSlidesTable extends Migration
{
    public function up()
    {
        Schema::create('custmer_slides', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('img');
            $table->string('url');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('custmer_slides');
    }
}
