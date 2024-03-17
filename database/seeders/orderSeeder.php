<?php

namespace Database\Seeders;

use App\Models\delivery;
use App\Models\order;
use App\Models\payment;
use App\Models\services;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class orderSeeder extends Seeder
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
        foreach ($services as  $service) {

                order::factory(3)->for($payments->random())->for($delivary->random())->for($service)->create();
                
        }
         
        }
    
}
