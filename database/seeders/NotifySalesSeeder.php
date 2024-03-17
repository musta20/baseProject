<?php

namespace Database\Seeders;

use App\Models\NotifySales;
use App\Models\User;
use Illuminate\Database\Seeder;

class NotifySalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::get();
        foreach ($users as $user) {

            NotifySales::factory(3)->for($user)->create(['from'=>$users->random()->id]);
        }
    }
}
