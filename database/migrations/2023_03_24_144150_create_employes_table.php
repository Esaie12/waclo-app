<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('telephone');
            $table->string('adresse')->nullable();
            $table->date('birthday')->nullable();
            $table->string('sexe');
            $table->string('photo')->nullable();
            $table->date('date_fonction');
            $table->date('date_fin_contrat');
            $table->string('contrat')->nullable();

            $table->boolean('actif')->default(1);
            $table->bigInteger('creer_par');
            $table->date('date_create');
            $table->date('date_depart')->nullable();
            $table->bigInteger('salaire')->default(0);

            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employes');
    }
}
