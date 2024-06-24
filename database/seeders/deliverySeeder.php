<?php

namespace Database\Seeders;

use App\Models\delivery;
use Illuminate\Database\Seeder;

class deliverySeeder extends Seeder
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
