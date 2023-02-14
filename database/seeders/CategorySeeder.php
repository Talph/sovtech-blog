<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $categories = array(
            array('id' => '1', 'name' => 'Technology', 'description' => 'Technology', 'slug' => 'technology'),
            array( 'id' => '2', 'name' => 'General', 'description' => 'General', 'slug' => 'general'),
            array('id' => '3', 'name' => 'Software Development', 'description' => 'Software Development', 'slug' => 'software-development'),
            array('id' => '4', 'name' => 'News', 'description' => 'News', 'slug' => 'news')
        );

        DB::table('categories')->insert($categories);

    }
}
