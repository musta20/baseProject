<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $Admin = Role::create(['name' => UserRole::Admin->value]);
        $Manger = Role::create(['name' => UserRole::Manager->value]);
        $Worker = Role::create(['name' => UserRole::Employee->value]);

        $Massages = Permission::create(['name' => 'Massages']);
        $Order = Permission::create(['name' => 'Order']);
        $CategoryServices = Permission::create(['name' => 'Category/Services']);
        $Setting = Permission::create(['name' => 'Setting']);
        $Users = Permission::create(['name' => 'Users']);
        $jobs = Permission::create(['name' => 'jobs']);
        $Logs = Permission::create(['name' => 'Logs']);
        $Employee = Permission::create(['name' => 'Employee']);
        $Reviews = Permission::create(['name' => 'Reviews']);
        $task = Permission::create(['name' => 'Task']);
        $TaskMangment = Permission::create(['name' => 'TaskMangment']);
        $Report = Permission::create(['name' => 'Report']);

        //$TaskMangment = Permission::create(['name' => 'Search']);

        $Worker->givePermissionTo($Massages);

        $Worker->givePermissionTo($Order);

        $Manger->givePermissionTo($Massages);
        $Manger->givePermissionTo($Order);
        $Manger->givePermissionTo($CategoryServices);
        $Manger->givePermissionTo($jobs);

        $Admin->givePermissionTo($Massages);
        $Admin->givePermissionTo($Order);
        $Admin->givePermissionTo($CategoryServices);
        $Admin->givePermissionTo($Setting);
        $Admin->givePermissionTo($Users);
        $Admin->givePermissionTo($jobs);
        $Admin->givePermissionTo($Report);

        $Admin->givePermissionTo($Logs);
        $Admin->givePermissionTo($Logs);
        $Admin->givePermissionTo($Employee);
        $Admin->givePermissionTo($Reviews);
        $Admin->givePermissionTo($task);
        $Admin->givePermissionTo($TaskMangment);
    }
}
