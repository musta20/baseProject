<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->string('email');

            $table->foreignUlid('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('phone');
            $table->text('des')->nullable();
            $table->string('title');
            $table->foreignUlid('delivery_id')->nullable()->references('id')->on('delivery')->onDelete('cascade');
            $table->foreignUlid('payment_id')->nullable()->references('id')->on('payments')->onDelete('cascade');

            $table->string('ip');
            $table->string('count');
            $table->string('time');
            $table->string('approve_time');
            $table->string('adress');

            $table->string('files');
            $table->integer('status');
            $table->integer('code');
            $table->integer('payed');

            $table->foreignUlid('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order');
    }
}
