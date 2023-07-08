<?php

use FontLib\Table\Type\name;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permission::create(["name" =>"administrer"]);
        // Permission::create(["name" =>"gérer les clients"]);
        // Permission::create(["name" =>"la caisse"]);

        $permissions = ["viewCharts","viewProduction","addProduction","addVentes","viewVentes","editVentes","deleteVentes","viewFactures","viewFactDetails","downloadFactures","addFournisseurs","viewFournisseurs","editFournisseurs","deleteFournisseurs","addTypeDepense","viewTypeDepense","editTypeDepense","deleteTypeDepense","addTypeRecette","viewTypeRecette","editTypeRecette","deleteTypeRecette","addDepenses","viewDepenses","editDepenses","deleteDepenses","addRecettes","viewRecettes","editRecettes","deleteRecettes","addIntrants","viewIntrants","editIntrants","deleteIntrants","addApprovisionnements","viewApprovisionnements","editApprovisionnements","deleteApprovisionnements","addIntrantsProduits","viewIntrantsProduits","editIntrantsProduits","deleteIntrantsProduits","addClients","viewClients","editClients","deleteClients","addAgents","viewAgents","editAgents","deleteAgents","addProduits","viewProduits","editProduits","deleteProduits","addUsers","viewUsers","editUsers","deleteUsers"];
        foreach ($permissions as $permission);
        {
            Permission::create(["name"=>$permission]);
        }

        $roles = ['admin','user','secretary'];
        foreach ($roles as $role);
        {
            Role::create(["name"=>$role]);
        }

    }
}
