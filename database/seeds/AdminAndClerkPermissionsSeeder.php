<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdminAndClerkPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $clerkPermissions = ["add stock", 'delete stock', 'update stock', 'view stock', 'view customers', 'view customer quotes'];
    private $adminPermissions = ['add user', 'delete user'];


    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');
        $this->createAdminPermission();
        $this->createclerkPermissions();
        $this->assignAdminRolesToAdminPermissions();
        $this->assignClerkRolesToClerkPermissions();
    }

    function createAdminPermission()
    {
        foreach ($this->adminPermissions as $perm) {
            Permission::create(['name' => $perm]);
        }
    }

    function createclerkPermissions()
    {
        foreach ($this->clerkPermissions as $perm) {
            Permission::create(['name' => $perm]);
        }
    }

    function assignAdminRolesToAdminPermissions()
    {
        $adminRole = Role::findByName('admin');

        //admin also has clerk permissions
        foreach ($this->clerkPermissions as $perm) {
            $adminRole->givePermissionTo($perm);
        }

        foreach ($this->adminPermissions as $perm) {
            $adminRole->givePermissionTo($perm);
        }
    }

    function assignClerkRolesToClerkPermissions()
    {
        $clerkRole = Role::findByName('clerk');
        foreach ($this->clerkPermissions as $perm) {
            $clerkRole->givePermissionTo($perm);
        }
    }
}
