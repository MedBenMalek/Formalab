<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {

            $table->increments('id');
            $table->string('title');
            $table->string('image_formation');
            $table->datetime('start');
            $table->datetime('end');
            $table->string('url')->nullable();
            $table->string('duree_formation');
            $table->text('prerequis_formation');
            $table->string('prix_formation');
            $table->text('objectif_formation');
            $table->text('programme_formation');
            $table->string('color');
           
            $table->integer('id_categorie')->unsigned();
            $table->integer('id_formateur')->unsigned();

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
        Schema::dropIfExists("formations");
    }
}
