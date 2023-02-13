<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = array(
            array(
                'id' => '1',
                'name' => 'Tafara Shamu',
                'username' => 'talph',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password')
            )
        );

        DB::table('users')->insert($admin);

    }
}
