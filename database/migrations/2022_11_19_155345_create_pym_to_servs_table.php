<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePymToServsTable extends Migration
{
    public function up()
    {
        Schema::create('pym_to_servs', function (Blueprint $table) {
            $table->foreignUlid('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreignUlid('payment_id')->references('id')->on('payments')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pym_to_servs');
    }
}
