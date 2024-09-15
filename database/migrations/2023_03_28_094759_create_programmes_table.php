<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgrammesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programmes', function (Blueprint $table) {
            //"idContrat":"1","date_passage":null,"heure_debut":null,"heure_fin":employes

            $table->id();
            $table->bigInteger('id_contrat');
            $table->date('date_passage');
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->text('employes');
            $table->text('employes_id');

            $table->text('remarques')->nullable();
            $table->boolean('effectuer')->default(0);
            $table->bigInteger('creer_by');

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
        Schema::dropIfExists('programmes');
    }
}
