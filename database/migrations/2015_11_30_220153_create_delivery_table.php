<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Delivery', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active');
            $table->string('title')->nullble();
            $table->string('price')->nullble();
            $table->text('description')->nullble();
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
        Schema::drop('Delivery');
    }
}
