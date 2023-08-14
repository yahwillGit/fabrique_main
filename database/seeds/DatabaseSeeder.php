<?php

use Database\Seeders\AdminSeeder;
use Database\Seeders\admintest;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  $this->call(PermissionSeeder::class);
        //$this->call(AdminSeeder::class);
        // $this->call(userSeeder::class);
        // $this->call(secretarySeeder::class);

        // $permissions = Permission::all();
        // $role = Role::where('name', 'admin')->first();
        // foreach ($permissions as $permission) {
        //     $role -> givePermissionTo($permission);
        // }

        $permissions = ['viewCharts','viewProduction','viewProduction','viewProduction','viewVentes','viewFactures','viewFactDetails','viewFournisseurs','viewTypeDepense','viewTypeRecette','viewDepenses','viewRecettes','viewIntrants','viewApprovisionnements','viewIntrantsProduits','viewClients','viewAgents','viewProduits','viewUsers'];
        $role = Role::where('name', 'user')->first();
        foreach ($permissions as $permission) {
            $role -> givePermissionTo($permission);
        }


    }
}
