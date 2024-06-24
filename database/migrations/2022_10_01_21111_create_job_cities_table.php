<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobCitiesTable extends Migration
{
    public function up()
    {
        Schema::create('job_cities', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_cities');
    }
}
