<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class secretarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = ['viewCharts','viewProduction','','','addVentes','viewVentes','viewFactures','viewFactDetails','downloadFactures','addVentes','addVentes','addVentes','addVentes','addVentes','addVentes','addVentes','addVentes','addVentes','addVentes','addVentes','addVentes',];
        $role = Role::where('name', 'secretary')->first();
        foreach ($permissions as $permission) {
            $role -> givePermissionTo($permission);
        }
    }
}
