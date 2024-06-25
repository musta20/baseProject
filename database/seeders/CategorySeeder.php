<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Process;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categorys = SeederData::$arabicCategories;
        // $imagePath = storage_path() . '/Images/';
        // $serviceImagePath = storage_path() . '/app/public/category/';

        foreach ($categorys as $cat) {

            // $productMediaImage =   collect(SeederData::$imageName)->random();

            // Process::run("cp " . $imagePath . $productMediaImage . " " . $serviceImagePath . $productMediaImage);

            category::factory()->create([
                'title' => $cat,
                'des' => $cat,
            ]);
        }

    }
}
