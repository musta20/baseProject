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

        $this->call([
            SettingSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,
            ClientsSeeder::class,
            DeliverySeeder::class,
            PaymentSeeder::class,
            CategorySeeder::class,
            CitySeeder::class,
            ServicesSeeder::class,
            OrderSeeder::class,
            MessageSeeder::class,
            ReportSeeder::class,
            TaskSeeder::class,
            NotifyTypeSeeder::class,
            SlideSeeder::class,
        ]);
        // \App\Models\Tasks::factory(10)->create();

    }
}
