<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $payments = SeederData::$payment;

        foreach ($payments as $value) {

            Payment::create([
                'name' => $value,
            ]);

        }
    }
}
