<?php

namespace Database\Seeders;

use App\Models\payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class paymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $payments = SeederData::$payment;
        foreach ($payments as $value) {
            payment::create([
                'name' => $value
            ]);
        }
    }
}
