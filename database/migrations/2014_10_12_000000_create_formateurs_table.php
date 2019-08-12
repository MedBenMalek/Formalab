<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formateurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('prenom')->nullable();
            $table->string('skills')->nullable();
            $table->string('telephone')->nullable();
            $table->string('adresse')->nullable();
            $table->text('presentation')->nullable();
            $table->text('experience')->nullable();
            $table->text('competence')->nullable();
            $table->string('image')->default("profile.jpg");
            $table->string('email')->unique();
            $table->string('password');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('googleplus')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('formateurs');
    }
}
