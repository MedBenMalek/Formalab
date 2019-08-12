<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActualitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actualites', function (Blueprint $table) {
            $table->increments('id_actualite');
            $table->string('titre_actualite');
            $table->string('image');
            $table->text('description_actualite');
            $table->integer('id_admin')->unsigned()->nullable();
            $table->integer('id_formateur')->unsigned()->nullable();
            $table->string('etat')->default('active');

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
        Schema::dropIfExists("actualites");
    }
}
