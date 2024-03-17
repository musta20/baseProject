<?php

namespace Database\Seeders;

use App\Models\delivery;
use App\Models\payment;
use App\Models\services;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Process;

class servicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imagePath = storage_path() . '/Images/';
        
        $serviceImagePath = storage_path() . '/app/public/services/';

        $services = SeederData::$Services;

        $payment = payment::get();
        $delivery = delivery::get();

        foreach ($services as $key) {


            $productMediaImage = collect(SeederData::$imageName)->random();

            Process::run("cp " . $imagePath . $productMediaImage . " " . $serviceImagePath . $productMediaImage);
                 
            $item = collect($key);

            services::factory()
            ->hasAttached(
                $payment->random(2),
            )
            ->hasAttached(
                $delivery->random(2),
            )
            ->create([
                "name"=>$item['name'],
                "des"=>$item['description'],
                "icon"=>$productMediaImage ,
            ]);
            
        }
    }
}
