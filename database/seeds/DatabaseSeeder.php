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
        $this->call([
            BaseinfoTableSeeder::class,
            AdminTableSeeder::class,
            PermissionTableSeeder::class,
            RoleTableSeeder::class,
            ProgrammerPermissions::class,
            SettingsTableSeeder::class,
        ]);
    }
}
