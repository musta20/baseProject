<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Delivery;
use App\Models\payment;
use App\Models\Services;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Process;

class ServicesSeeder extends Seeder
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

        $category = category::get();
        foreach ($services as $key) {

            $productMediaImage = collect(SeederData::$imageName)->random();

            // Process::run("cp " . $imagePath . $productMediaImage . " " . $serviceImagePath . $productMediaImage);

            $item = collect($key);

            services::factory()->for($category->random())
                ->hasAttached(
                    $payment->random(2),
                )
                ->hasAttached(
                    $delivery->random(2),
                )
                ->create([
                    'name' => $item['name'],
                    'des' => $item['description'],
                    'icon' => $productMediaImage,
                ]);

        }
    }
}
