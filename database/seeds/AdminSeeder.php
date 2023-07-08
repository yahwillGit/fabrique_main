<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
// use Spatie\Permission\Contracts\Permission;
// use Spatie\Permission\Contracts\Role;



class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();
        $role = Role::where('name', 'admin')->first();
        foreach ($permissions as $permission) {
            $role -> givePermissionTo($permission);
        }
    }
}
