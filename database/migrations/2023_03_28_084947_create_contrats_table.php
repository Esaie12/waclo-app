<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrats', function (Blueprint $table) {
           $table->id();
            $table->bigInteger('id_client');
            $table->date('date_debut');
            $table->date('date_fin')->nullable();
            $table->bigInteger('frequence');
            $table->string('modalite');

            $table->string('fichier_contrat')->nullable();
            $table->date('date_create');
            $table->bigInteger('creer_by');
            $table->bigInteger('montant')->default(0000);
            $table->boolean('boucler')->default(0);
            $table->boolean('view_client')->default(0);

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
        Schema::dropIfExists('contrats');
    }
}
