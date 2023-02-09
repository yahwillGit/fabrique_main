<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(["name" =>"administrer"]);
        Permission::create(["name" =>"gérer les clients"]);
        Permission::create(["name" =>"la caisse"]);
    }
}
