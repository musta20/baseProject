<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlideTable extends Migration
{
    public function up()
    {
        Schema::create('slide', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('img');
            $table->string('title');
            $table->longText('des');
            $table->string('url');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('slide');
    }
}
