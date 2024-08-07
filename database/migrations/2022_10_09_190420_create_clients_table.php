<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->string('name');
            $table->longText('des')->nullable();
            $table->integer('rate')->nullable();
            $table->integer('status');
            $table->integer('israted');
            $table->string('token');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
