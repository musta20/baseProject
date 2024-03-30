<?php

namespace Database\Seeders;

use App\Models\message;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::get();
        foreach ($users as $user) {

            message::factory(5)->create(["from" => $user->id, "to" => $users->random()->id]);
        }
    }
}
