<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobAppsTable extends Migration
{
    public function up()
    {
        Schema::create('job_apps', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('cert');
            $table->string('exp');
            $table->longText('exp_des');
            $table->string('city');

            $table->string('job_city');

            $table->string('majer');
            $table->string('code');
            $table->string('cv');

            $table->foreignUlid('job_id')->references('id')->on('jobs')->onDelete('cascade');

            $table->longText('about');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_apps');
    }
}
