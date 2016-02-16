<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlaiderTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('slaiders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link', 255);
            $table->text('image_url')->nullable();
            $table->string('slug', 100);
            $table->timestamps();
        });

        Schema::create('slaider_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('slaider_id')->unsigned();
            $table->string('name', 100);
            $table->text('description');
            $table->string('locale')->index();
            $table->unique(['slaider_id', 'locale']);
            $table->foreign('slaider_id')->references('id')->on('slaiders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('slaider_translations');
        Schema::drop('slaiders');
    }

}
