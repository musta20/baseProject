<?php

namespace Database\Seeders;

use App\Models\job_city;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class cityseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $citys = SeederData::$citys;
        
        foreach ($citys as $value) {
            $item = job_city::where('name', $value)->first();
            if (!$item) {
                job_city::create(["name" => $value]);
            }
        } 
    }
}
