<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Database\Seeder;

class taskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $users = User::get(); 
        $Mangers = User::role(UserRole::Manager->value)->get(); 

        
        foreach ($users as $user) {

            Tasks::factory(3)->withManger($Mangers->random())->for($user)->create();
       
        }
        
    }
}
