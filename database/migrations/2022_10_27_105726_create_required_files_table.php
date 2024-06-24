<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequiredFilesTable extends Migration
{
    public function up()
    {
        Schema::create('required_files', function (Blueprint $table) {

            $table->ulid('id')->primary();

            $table->integer('type');

            $table->foreignUlid('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('required_files');
    }
}
