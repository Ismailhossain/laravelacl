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
//        DB::table('permissions')->truncate();
        Permission::create([
            'id' => 1,
            'permission_title' => 'Can View',
            'permission_slug' => 'can_view',
            'description' => 'Permission to view only.'
        ]);
        Permission::create([
            'id' => 2,
            'permission_title' => 'Can Create',
            'permission_slug' => 'can_create',
            'description' => 'Permission to create user.'
        ]);
        Permission::create([
            'id' => 3,
            'permission_title' => 'Can Edit',
            'permission_slug' => 'can_edit',
            'description' => 'Permission to edit user.'
        ]);
        Permission::create([
            'id' => 4,
            'permission_title' => 'Can Delete',
            'permission_slug' => 'can_delete',
            'description' => 'Permission to delete user.'
        ]);

    }
}
