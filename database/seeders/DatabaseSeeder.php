<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //\App\Models\User::factory(30)->create();
        // \App\Models\order::factory(10)->create();
        // \App\Models\message::factory(20)->create();
        // \App\Models\clients::factory(20)->create();
        // \App\Models\Report::factory(20)->create();

        \App\Models\TasksNotify::factory(10)->create();

    }
}
