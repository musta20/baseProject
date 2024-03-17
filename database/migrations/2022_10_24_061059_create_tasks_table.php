<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string("title");
            $table->longText("des");
            $table->integer("isdone");
            $table->integer("isread");

            $table->foreignUlid("user_id")->references("id")->on("users")->onDelete("cascade");

            $table->foreignUlid("boss_id")->references("id")->on("users")->onDelete("cascade");

            $table->date("start");
            $table->date("end");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
