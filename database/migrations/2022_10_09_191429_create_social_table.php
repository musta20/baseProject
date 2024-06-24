<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialTable extends Migration
{
    public function up()
    {
        Schema::create('social', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->text('img');
            $table->string('url');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('social');
    }
}
