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
            $table->integer('user_id');
            $table->string('numberhouse');
            $table->string('image');
            $table->string('nhucau');
            $table->string('area');
            $table->integer('quantityfloor');
            $table->integer('quantitybed');
            $table->integer('quantitybath');
            $table->string('description');
            $table->integer('price');
            $table->integer('matp');
            $table->integer('maqh');
            $table->integer('xaid');
            $table->string('image_path');
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
