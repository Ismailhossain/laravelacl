<?php

use Illuminate\Database\Seeder;
//use Illuminate\Database\Eloquent\Model;

use App\Role;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment() === 'production') {
            exit('Lets stop');
        }
//        DB::table('roles')->truncate();
        Role::create([
            'id'            => 1,
            'role_title'          => 'Root',
            'role_slug'  => 'root',
            'description'   => 'Use this account with extreme caution. When using this account it is possible to cause irreversible damage to the system.'


        ]);
        Role::create([
            'id'            => 2,
            'role_title'          => 'Administrator',
            'role_slug'  => 'administrator',
            'description'   => 'Full access to create, edit, and update.'


        ]);
        Role::create([
            'id'            => 3,
            'role_title'          => 'Manager',
            'role_slug'  => 'manager',
            'description'   => 'Ability to create new or edit and update any existing ones.'


        ]);
        Role::create([
            'id'            => 4,
            'role_title'          => 'Company Manager',
            'role_slug'  => 'company_manager',
            'description'   => 'Able to manage the company that the user belongs to, including adding sites, creating new users.'


        ]);
        Role::create([
            'id'            => 5,
            'role_title'          => 'User',
            'role_slug'  => 'user',
            'description'   => 'A standard user , No administrative features.'


        ]);
    }
}
