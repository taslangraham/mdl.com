<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');
        $roles = ['admin', 'customer', 'clerk'];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
