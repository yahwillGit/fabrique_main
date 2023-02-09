<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('commentaire')->nullable();
            $table->unsignedBigInteger('client_id');
            $table->double('montant_ht')->nullable();
            $table->double('montant_tva')->nullable();
            $table->double('remise')->nullable();
            $table->double('ristourne')->nullable();
            $table->double('montant_ttc')->nullable();
            $table->double('montant_reste')->nullable();
            $table->string('fichier')->nullable();
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
        Schema::dropIfExists('factures');
    }
}
