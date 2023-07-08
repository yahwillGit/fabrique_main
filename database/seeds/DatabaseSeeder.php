<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     PermissionSeeder::class,
        //     AdminSeeder::class,
        //     userSeeder::class,
        //     secretarySeeder::class,
        // ]);

        // $this->call(PermissionSeeder::class);
       // $this->call(AdminSeeder::class);
        $this->call(userSeeder::class);
        // $this->call(secretarySeeder::class);
    }
}
