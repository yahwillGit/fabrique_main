<?php
namespace Database\Seeders;

use FontLib\Table\Type\name;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $permissions = [

            ['name' => 'viewCharts','guard_name' => "web"],
            ['name' => 'viewProduction','guard_name' => "web"],
            ['name' => 'addProduction','guard_name' => "web"],
            ['name' => 'addVentes','guard_name' => "web"],
            ['name' => 'viewVentes','guard_name' => "web"],
            ['name' => 'editVentes','guard_name' => "web"],
            ['name' => 'deleteVentes','guard_name' => "web"],
            ['name' => 'viewFactures','guard_name' => "web"],
            ['name' => 'viewFactDetails','guard_name' => "web"],
            ['name' => 'downloadFactures','guard_name' => "web"],
            ['name' => 'addFournisseurs','guard_name' => "web"],
            ['name' => 'viewFournisseurs','guard_name' => "web"],
            ['name' => 'editFournisseurs','guard_name' => "web"],
            ['name' => 'deleteFournisseurs','guard_name' => "web"],
            ['name' => 'addTypeDepense','guard_name' => "web"],
            ['name' => 'viewTypeDepense','guard_name' => "web"],
            ['name' => 'editTypeDepense','guard_name' => "web"],
            ['name' => 'deleteTypeDepense','guard_name' => "web"],
            ['name' => 'addTypeRecette','guard_name' => "web"],
            ['name' => 'viewTypeRecette','guard_name' => "web"],
            ['name' => 'editTypeRecette','guard_name' => "web"],
            ['name' => 'deleteTypeRecette','guard_name' => "web"],
            ['name' => 'addDepenses','guard_name' => "web"],
            ['name' => 'viewDepenses','guard_name' => "web"],
            ['name' => 'editDepenses','guard_name' => "web"],
            ['name' => 'deleteDepenses','guard_name' => "web"],
            ['name' => 'addRecettes','guard_name' => "web"],
            ['name' => 'viewRecettes','guard_name' => "web"],
            ['name' => 'editRecettes','guard_name' => "web"],
            ['name' => 'deleteRecettes','guard_name' => "web"],
            ['name' => 'addIntrants','guard_name' => "web"],
            ['name' => 'viewIntrants','guard_name' => "web"],
            ['name' => 'editIntrants','guard_name' => "web"],
            ['name' => 'deleteIntrants','guard_name' => "web"],
            ['name' => 'addApprovisionnements','guard_name' => "web"],
            ['name' => 'viewApprovisionnements','guard_name' => "web"],
            ['name' => 'editApprovisionnements','guard_name' => "web"],
            ['name' => 'deleteApprovisionnements','guard_name' => "web"],
            ['name' => 'addIntrantsProduits','guard_name' => "web"],
            ['name' => 'viewIntrantsProduits','guard_name' => "web"],
            ['name' => 'editIntrantsProduits','guard_name' => "web"],
            ['name' => 'deleteIntrantsProduits','guard_name' => "web"],
            ['name' => 'addClients','guard_name' => "web"],
            ['name' => 'viewClients','guard_name' => "web"],
            ['name' => 'editClients','guard_name' => "web"],
            ['name' => 'deleteClients','guard_name' => "web"],
            ['name' => 'addAgents','guard_name' => "web"],
            ['name' => 'viewAgents','guard_name' => "web"],
            ['name' => 'editAgents','guard_name' => "web"],
            ['name' => 'deleteAgents','guard_name' => "web"],
            ['name' => 'addProduits','guard_name' => "web"],
            ['name' => 'viewProduits','guard_name' => "web"],
            ['name' => 'editProduits','guard_name' => "web"],
            ['name' => 'deleteProduits','guard_name' => "web"],
            ['name' => 'addUsers','guard_name' => "web"],
            ['name' => 'viewUsers','guard_name' => "web"],
            ['name' => 'editUsers','guard_name' => "web"],
            ['name' => 'deleteUsers','guard_name' => "web"],

        ];

        Permission::insert($permissions);


        $roles = [

            ['name' => 'admin','guard_name' => "web"],
            ['name' => 'secretary','guard_name' => "web"],
            ['name' => 'user','guard_name' => "web"]

        ];

        Role::insert($roles);



        // $roles = ['admin','user','secretary'];
        // foreach ($roles as $key => $role);
        // {
        //     Role::create(['name'=>$role]);
        // }

        // Role::create(["name"=>'admin']);
        // Role::create(["name"=>'user']);
        // Role::create(["name"=>'secretary']);

    }
}
