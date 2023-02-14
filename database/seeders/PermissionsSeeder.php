<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $permissions = array(
            array('id' => '1', 'name' => 'Full permissions', 'slug' => 'full-permissions'),
            array('id' => '2', 'name' => 'Create user', 'slug' => 'create-user'),
            array('id' => '3', 'name' => 'Update user', 'slug' => 'update-user'),
            array('id' => '4', 'name' => 'Delete user', 'slug' => 'delete-user'),
            array('id' => '5', 'name' => 'View user', 'slug' => 'view-user'),
            array('id' => '6', 'name' => 'Create post', 'slug' => 'create-post'),
            array('id' => '7', 'name' => 'Update post', 'slug' => 'update-post'),
            array('id' => '8', 'name' => 'Delete post', 'slug' => 'delete-post'),
            array('id' => '9', 'name' => 'View post', 'slug' => 'view-post'),

        );

        DB::table('permissions')->insert($permissions);


        $users_permissions = array(
            array('user_id' => 1, 'permission_id' => 1),

        );

        DB::table('users_permissions')->insert($users_permissions);


        $roles_permissions = array(
            array('role_id' => 1, 'permission_id' => 1),
            array('role_id' => 2, 'permission_id' => 2),
            array('role_id' => 2, 'permission_id' => 3),
            array('role_id' => 2, 'permission_id' => 4),
            array('role_id' => 2, 'permission_id' => 5),
            array('role_id' => 2, 'permission_id' => 6),
            array('role_id' => 2, 'permission_id' => 7),
            array('role_id' => 2, 'permission_id' => 8),
            array('role_id' => 2, 'permission_id' => 9),
            array('role_id' => 3, 'permission_id' => 6),
            array('role_id' => 3, 'permission_id' => 7),
            array('role_id' => 3, 'permission_id' => 8),
            array('role_id' => 3, 'permission_id' => 9),
            array('role_id' => 4, 'permission_id' => 6),
            array('role_id' => 4, 'permission_id' => 9)
        );

        DB::table('roles_permissions')->insert($roles_permissions);


        $users_role = array(
            array('user_id' => 1, 'role_id' => 1),

        );

        DB::table('users_roles')->insert($users_role);
    }
}
