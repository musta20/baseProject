<?php

namespace Database\Seeders;

use App\Models\clients;
use Database\Factories\clientsFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class clientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        clients::factory(10)->create();
    }
}
