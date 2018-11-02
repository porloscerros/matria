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
                'public' => true
            ],
            [
                'name' => 'services',
                'public' => false
            ],
            [
                'name' => 'products',
                'public' => false
            ],
            [
                'name' => 'gallery',
                'public' => true
            ],
            [
                'name' => 'posts',
                'public' => true
            ],
            [
                'name' => 'about',
                'public' => false
            ],
            [
                'name' => 'contact-us',
                'public' => true
            ]
        ]);
    }
}
