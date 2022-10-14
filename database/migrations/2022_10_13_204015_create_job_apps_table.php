<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_apps', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email");
            $table->string("phone");
            $table->string("cert");
            $table->string("exp");
            $table->string("exp_des");
            $table->string("city");
            $table->string("job_city");
            $table->string("majer");
            $table->string("code");
            $table->string("cv");
            $table->string("job_id");
            $table->string("about");
            
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
        Schema::dropIfExists('job_apps');
    }
}
