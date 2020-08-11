<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTumeursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tumeurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_tumeur');
            $table->string('diagnostic_de_base');
            $table->string('topographie');
            $table->string('morphologie');
            $table->string('comportement_tumoral');
            $table->string('differenciation_histologique');
            $table->string('classification_TNM');
            $table->string('extension');
            $table->string('siege_metastase');
            $table->date('date_incidence');
            $table->bigInteger('patient_id');
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
        Schema::dropIfExists('tumeurs');
    }
}
