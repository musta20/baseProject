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
            $table->id();
            $table->integer("type");
            $table->string("name");
            $table->string("number");
            $table->bigInteger("from");
            $table->bigInteger("user_id");
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
