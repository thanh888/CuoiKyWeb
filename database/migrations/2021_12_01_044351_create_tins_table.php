<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('housingtype_id');
            $table->integer('need_id');
            $table->integer('user_id');
            $table->integer('inforuser_id');
            $table->string('numberhouse');
            $table->string('image');
            $table->string('image_path');
            $table->integer('quantityfloor')->nullable();
            $table->integer('quantitybed')->nullable();
            $table->integer('quantitybath')->nullable();
            $table->string('description');
            $table->string('price');
            $table->integer('matp');
            $table->integer('maqh');
            $table->integer('xaid');
            $table->string('large');
            $table->string('daypost');
            $table->integer('quantity_daypost_id');
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
        Schema::dropIfExists('tins');
    }
}
