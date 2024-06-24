<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevToServsTable extends Migration
{
    public function up()
    {
        Schema::create('dev_to_servs', function (Blueprint $table) {
            $table->foreignUlid('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreignUlid('delivery_id')->references('id')->on('delivery')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dev_to_servs');
    }
}
