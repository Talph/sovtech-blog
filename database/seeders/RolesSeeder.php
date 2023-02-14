<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $roles = array(
            array('id' => '1', 'name' => 'Admin', 'slug' => 'admin'),
            array('id' => '2', 'name' => 'Manager', 'slug' => 'manager'),
            array('id' => '3', 'name' => 'Editor', 'slug' => 'editor'),
            array('id' => '4', 'name' => 'user', 'slug' => 'user')

        );

        DB::table('roles')->insert($roles);
    }
}
