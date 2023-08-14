<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = ['viewCharts','viewProduction','viewProduction','viewProduction','viewVentes','viewFactures','viewFactDetails','viewFournisseurs','viewTypeDepense','viewTypeRecette','viewDepenses','viewRecettes','viewIntrants','viewApprovisionnements','viewIntrantsProduits','viewClients','viewAgents','viewProduits','viewUsers'];
        $role = Role::where('name', 'user')->first();
        foreach ($permissions as $permission) {
            $role -> givePermissionTo($permission);
        }
    }
}
