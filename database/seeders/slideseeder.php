<?php

namespace Database\Seeders;

use App\Models\services;
use App\Models\slide;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Process;

class slideseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $imagePath = storage_path() . '/Images/';

        $SlideImagePath = storage_path() . '/app/public/Slide/';

        $slides = [
            [
                'img' => 'qstlYB1hJ1lTm6xfnv4qd97LqkjR094OuFIZax0b.jpg',

            ],
            [
                'img' => 'Ow4JzGchQTlM2W2XzWlUw45o7o3omYsysYomQXtx.jpg',

            ],
            [
                'img' => '9ikVuCgYdLtitduCZ1CNY3U63psccANkCR7izn34.jpg',
            ],
        ];

        foreach ($slides as $key => $value) {

            Process::run('cp ' . $imagePath . $value['img'] . ' ' . $SlideImagePath . $value['img']);

            slide::factory()->create([
                'img' => 'Slide/' . $value['img'],
                'url' => route('services', services::get()->random()->id),
            ]);

        }

    }
}
