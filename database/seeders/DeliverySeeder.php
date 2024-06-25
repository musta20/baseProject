<?php

namespace Database\Seeders;

use App\Models\Delivery;
use Illuminate\Database\Seeder;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $delivery = SeederData::$delivery;

        foreach ($delivery as $value) {
            delivery::factory()->create([
                'name' => $value,
            ]);
        }
    }
}
