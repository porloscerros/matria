<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_sections')->insert([
            [
                'name' => 'header',
                'public' => true,
                'order' => (int) 1
            ],
            [
                'name' => 'services',
                'public' => false,
                'order' => (int) 2
            ],
            [
                'name' => 'products',
                'public' => false,
                'order' => (int) 3
            ],
            [
                'name' => 'gallery',
                'public' => true,
                'order' => (int) 4
            ],
            [
                'name' => 'posts',
                'public' => true,
                'order' => (int) 5
            ],
            [
                'name' => 'about',
                'public' => false,
                'order' => (int) 6
            ],
            [
                'name' => 'contact-us',
                'public' => true,
                'order' => (int) 7
            ]
        ]);
    }
}
