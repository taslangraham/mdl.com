<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CustomerPermissionsSeeder extends Seeder
{
    private  $permissions = [
        'view items',
        'purchase',
        'get quote',
        'view cart',
        'edit cart',
        'delete cart item'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createCustomerPermissions();
        $this->assignPermissionsToCustomerRole();
    }

    function createCustomerPermissions()
    {
        foreach ($this->permissions as $perm) {
            Permission::create(['name' => $perm]);
        }
    }

    function assignPermissionsToCustomerRole()
    {
        $role = Role::findByName('customer');

        foreach ($this->permissions as $perm) {
            $role->givePermissionTo($perm);
        }
    }
}
