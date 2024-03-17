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
        settingSeeder::class,
        permissionSeeder::class,
        userSeeder::class,
        clientsSeeder::class,
        deliverySeeder::class,
        paymentSeeder::class,
        servicesSeeder::class,
        orderSeeder::class,
        MessageSeeder::class,
        reportSeeder::class,
        taskSeeder::class,
        NotifySalesSeeder::class,
        categorySeeder::class,
        NotifyTypeSeeder::class,
      ]);
      // \App\Models\Tasks::factory(10)->create();

    }
}
