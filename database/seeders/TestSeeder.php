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
            SettingSeeder::class,
            PermissionSeeder::class,
            CategorySeeder::class,
            ClientsSeeder::class,
            DeliverySeeder::class,
        ]);
    }
}
