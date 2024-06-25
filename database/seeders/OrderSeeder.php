<?php

namespace Database\Seeders;

use App\Models\Delivery;
use App\Models\Order;
use App\Models\payment;
use App\Models\Services;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = services::get();
        $payments = payment::get();
        $delivary = delivery::get();
        $users = User::get();
        foreach ($services as $service) {

            order::factory(3)->for($users->random())->for($payments->random())->for($delivary->random())->for($service)->create();

        }

    }
}
