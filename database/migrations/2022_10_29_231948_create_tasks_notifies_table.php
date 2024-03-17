<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksNotifiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks_notifies', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->integer("type");
            $table->string("name");
            $table->string("number");
            $table->foreignUlid("from")->references("id")->on("users")->onDelete("cascade");
            $table->foreignUlid("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->date("issueAt");
            $table->date("exp");
            $table->integer("duration");
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
        Schema::dropIfExists('tasks_notifies');
    }
}
