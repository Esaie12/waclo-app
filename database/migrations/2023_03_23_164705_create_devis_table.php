<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devis', function (Blueprint $table) {

            $table->id();
            $table->string('espace')->nullable();
            $table->string('frequence')->nullable();
            $table->string('surface')->nullable();
            $table->string('activite_society')->nullable();
            $table->string('demarrage')->nullable();
            $table->string('collabo_society')->nullable();
            $table->string('your_name')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('name_society')->nullable();
            $table->string('others')->nullable();
            $table->string('services')->nullable();
            $table->string('fichier')->nullable();

            $table->date('date_emission');
            $table->date('date_traitement')->nullable();
            $table->boolean('traiter')->default(0);
            $table->bigInteger('traiter_by')->nullable();
            $table->string('fichier_send')->nullable();

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
        Schema::dropIfExists('devis');
    }
}
