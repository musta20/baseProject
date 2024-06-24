<?php

namespace Database\Seeders;

use App\Models\NotifyType;
use Illuminate\Database\Seeder;

class NotifyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $notifytype = SeederData::$notifytype;

        foreach ($notifytype as $item) {

            NotifyType::create([

                'name' => $item,

            ]);

        }

    }
}
