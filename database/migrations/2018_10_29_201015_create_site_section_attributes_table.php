<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;

class CreateSiteSectionAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_section_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('site_section_id')->unsigned();
            $table->string('title', 140)->nullable();
            $table->string('subtitle')->nullable();
            $table->integer('bg_img_id')->unsigned()->nullable();
            $table->string('text_color', 80)->nullable();

            $table->foreign('site_section_id')
                ->references('id')->on('site_sections')
                ->onDelete('cascade');
            $table->foreign('bg_img_id')->references('id')->on('media');
        });

        Artisan::call('db:seed', [
            '--class' => SiteSectionAttributesTableSeeder::class,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_section_attributes');
    }
}
