<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTypesTable extends Migration
{
    public function up()
    {
        Schema::create('sales_types', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->bigInteger('price');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales_types');
    }
}
