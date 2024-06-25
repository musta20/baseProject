<?php

namespace Database\Seeders;

use App\Models\Jobcity;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $citys = SeederData::$citys;

        foreach ($citys as $value) {
            $item = Jobcity::where('name', $value)->first();
            if (! $item) {
                Jobcity::create(['name' => $value]);
            }
        }
    }
}
