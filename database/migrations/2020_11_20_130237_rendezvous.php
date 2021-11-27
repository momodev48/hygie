<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rendezvous extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendezvous', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone');
            $table->string('email');
            $table->date('date');
            $table->string('heure');
            $table->string('commentaire');
            $table->string('statut');
            //$table->rememberToken();  on l'utilise pour memorise les données de connexion par exemple
            $table->timestamps(); //va créer 2 colonnes dans ta base de données :
            //• created_at qui va contenir une date qui va correspondre au timestamp de la création de l'entrée dans la BDD
            //• updated_at qui va contenir une date qui sera équivalante à chaque action effectuée sur la colonne (la création et l'édition)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rendezvous');
    }
}
