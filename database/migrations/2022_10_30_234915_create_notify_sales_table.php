<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotifySalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notify_sales', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("user_id");
            $table->integer("from");
            $table->integer("count");
            $table->integer("type");
            $table->integer("isDone");
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
        Schema::dropIfExists('notify_sales');
    }
}
