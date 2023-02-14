<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
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
                'name' => 'Tamara Shame',
                'email_verified_at' => now(),
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
                'remember_token' => str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            )
        );

        DB::table('users')->insert($admin);
    }
}
