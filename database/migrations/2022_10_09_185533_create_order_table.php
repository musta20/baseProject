<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email");
            $table->string("empy_id");
            $table->bigInteger("phone");
            $table->text("des");
            $table->string("title");
            $table->string("receipt");
            $table->string("cash");

            $table->string("ip");
            $table->string("count");
            $table->string("time");
            $table->string("approve_time");
            $table->string("adress");

            $table->string("files");
            $table->integer("status");
            $table->integer("code");
            $table->integer("payed");

            
            $table->integer("s_id");
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
        Schema::dropIfExists('order');
    }
}
