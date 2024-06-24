<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotifyTypesTable extends Migration
{
    public function up()
    {
        Schema::create('notify_types', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notify_types');
    }
}
