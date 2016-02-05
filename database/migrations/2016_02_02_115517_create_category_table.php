<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('main_category');
            $table->string('image_url')->nullable();
            $table->string('slug',100);
            $table->string('code');
            $table->timestamps();
        });
        
         Schema::create('category_translations', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('category_id')->unsigned();
             $table->string('title', 100);
             $table->string('locale')->index();
             $table->unique(['category_id','locale']);
             $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

        });
    }
    
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('category_translations');
        Schema::drop('categories');
    }
}
