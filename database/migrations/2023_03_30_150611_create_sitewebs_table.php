<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitewebsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitewebs', function (Blueprint $table) {
            /*
            "adresse":null,"telephone":null,"email_one":null,"email_deux":null,"facebook":null,"twitter":null,"whatsapp":null,"tiktok":null,"google_maps":
            */
            $table->id();
            $table->string('adresse')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email_one')->nullable();
            $table->string('email_deux')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('tiktok')->nullable();
            $table->text('google_maps')->nullable();

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
        Schema::dropIfExists('sitewebs');
    }
}
