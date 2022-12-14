<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->id();

            $table->string("title");
            $table->string("des");
            $table->string("keyword");
            $table->string("map");
            $table->string("terms");

            $table->string("phone");
            $table->string("adress");
            $table->string("email");

            $table->string("billterm");
            $table->string("footer");
            $table->string("logo");

            $table->string("footertext");
            $table->string("copyright");
            $table->string("weekwork");

            
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
        Schema::dropIfExists('setting');
    }
}
