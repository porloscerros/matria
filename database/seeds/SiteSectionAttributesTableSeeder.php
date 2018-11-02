<?php

use Illuminate\Database\Seeder;

class SiteSectionAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_section_attributes')->insert([
            [
                'site_section_id' => (int) 1,
                'title' => 'Inicio',
                'subtitle' => 'mensaje de bienvenida',
                'bg_img_id' => null,
                'text_color' => ''
            ],
            [
                'site_section_id' => (int) 2,
                'title' => 'Servicios',
                'subtitle' => '',
                'bg_img_id' => null,
                'text_color' => ''
            ],
            [
                'site_section_id' => (int) 3,
                'title' => 'Productos',
                'subtitle' => '',
                'bg_img_id' => null,
                'text_color' => ''
            ],
            [
                'site_section_id' => (int) 4,
                'title' => 'Gallería',
                'subtitle' => '',
                'bg_img_id' => null,
                'text_color' => ''
            ],
            [
                'site_section_id' => (int) 5,
                'title' => 'Artículos',
                'subtitle' => '',
                'bg_img_id' => null,
                'text_color' => ''
            ],
            [
                'site_section_id' => (int) 6,
                'title' => 'Sobre mí',
                'subtitle' => '',
                'bg_img_id' => null,
                'text_color' => ''
            ],
            [
                'site_section_id' => (int) 7,
                'title' => 'Contacto',
                'subtitle' => '',
                'bg_img_id' => null,
                'text_color' => ''
            ]
        ]);
    }
}
