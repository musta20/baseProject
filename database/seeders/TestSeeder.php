<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $this->call([
            settingSeeder::class,
            permissionSeeder::class,
            categorySeeder::class,
            clientsSeeder::class,
            deliverySeeder::class,
        ]);
    }
}
