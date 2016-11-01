<?php

use Illuminate\Database\Seeder;

use App\Permission;


class PermissionsTableSeeder extends Seeder
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
        Permission::create([
            'id'            => 1,
            'permission_title'          => 'Can create',
            'permission_slug'          => 'can_create',
            'description'   => 'Permission to create user.'
        ]);
        Permission::create([
            'id'            => 2,
            'permission_title'          => 'Can edit',
            'permission_slug'          => 'can_edit',
            'description'   => 'Permission to edit user.'
        ]);
        Permission::create([
            'id'            => 3,
            'permission_title'          => 'Can delete',
            'permission_slug'          => 'can_delete',
            'description'   => 'Permission to delete user.'
        ]);

    }
}
