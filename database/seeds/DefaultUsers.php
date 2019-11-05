<?php

use Illuminate\Database\Seeder;
use App\User;

class DefaultUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createDefaultUsers();
    }


    function createDefaultUsers()
    {
        $this->createDefaultCustomer();
        $this->createDefaultAdmin();
        $this->createDefaultClerk();
    }
    function createDefaultCustomer()
    {
        $customer = User::create([
            'name' => 'Rob Holding',
            'email' => 'holding@gmail.com',
            'password' => Hash::make('secret'),
            'street'=>'3A Tavern',
            'town'=>'Kingston',
            'parish'=>'Kingston',
        ]);
        $customer->assignRole('customer');
    }

    function createDefaultAdmin()
    {
        $admin = User::create([
            'name' => 'Default Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('secret'),
            'street'=>'3A Tavern',
            'town'=>'Kingston',
            'parish'=>'Kingston',
        ]);
        $admin->assignRole('admin');
    }

    function createDefaultClerk()
    {
        $clerk = User::create([
            'name' => 'Mdl Clerk',
            'email' => 'clerk@gmail.com',
            'password' => Hash::make('secret'),
            'street'=>'3A Tavern',
            'town'=>'Kingston',
            'parish'=>'Kingston',
        ]);
        $clerk->assignRole('clerk');
    }
}
