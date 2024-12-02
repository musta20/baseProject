<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->withRole(UserRole::Admin->value)->create(
            [
                'email' => 'admin@gmail.com',
                'name' => 'admin',
                'password' => Hash::make('admin'),
            ]
        );
    
        User::factory()->withRole(UserRole::Employee->value)->create(
            [
                'email' => 'employee@gmail.com',
                'name' => 'موظف',
                'password' => Hash::make('1234'),
            ]
        );
        User::factory(10)->withRole(UserRole::Employee->value)->create();
        User::factory(10)->withRole(UserRole::Manager->value)->create();
    }
}
