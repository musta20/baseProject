<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->string('name');

            $table->integer('price');

            $table->foreignUuid('category_id')->references('id')->on('category')->onDelete('cascade');

            $table->text('des')->nullable();

            $table->string('icon')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
}
