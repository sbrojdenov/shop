<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->char('category', 15);
            $table->string('email')->unique();
            $table->string('user_name', 50);
            $table->bigInteger('telephone');
            $table->integer('quantity');
            $table->string('adress');
            $table->string('town', 50);
            $table->string('comment');
            $table->smallInteger('viewed');
            $table->integer('code')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
