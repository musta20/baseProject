<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('title');
            $table->mediumText('des');

            $table->foreignUlid('job_cities_id')
                ->references('id')
                ->on('job_cities')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
