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
        // $this->call(UsersTableSeeder::class);
        $this->call(Roles::class);
        $this->call(AdminAndClerkPermissionsSeeder::class);
        $this->call(CustomerPermissionsSeeder::class);
        $this->call(DefaultUsers::class);
    }
}
