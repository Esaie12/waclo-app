<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travails', function (Blueprint $table) {
            $table->id();
            $table->string('your_name')->nullable();
            $table->string('sexe')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->bigInteger('age');
            $table->string('adresse')->nullable();
            $table->text('others')->nullable();

            $table->date('date_demande');
            $table->date('date_traitement')->nullable();
            $table->boolean('traiter')->default(0);
            $table->bigInteger('traiter_by')->nullable();
            $table->date('date_rdv')->nullable();
            $table->bigInteger('reject_dossier')->default(0);

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
        Schema::dropIfExists('travails');
    }
}
