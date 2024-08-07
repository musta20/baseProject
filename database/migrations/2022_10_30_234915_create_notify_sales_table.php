<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('notify_sales', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->foreignUlid('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignUlid('from')->references('id')->on('users')->onDelete('cascade');
            $table->integer('count');
            $table->integer('type');
            $table->integer('isDone');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notify_sales');
    }
};
