<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->increments('id_inscription');
            $table->string('nom');
            $table->string('prenom');
            $table->string('niveau_etude');
            $table->string('telephone');
            $table->string('email');
            $table->text('message')->nullable();
            $table->integer('id_formation')->unsigned();
            $table->string('etat')->default('pas encore validé');
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

        Schema::dropIfExists("inscription");
        
    }
}
