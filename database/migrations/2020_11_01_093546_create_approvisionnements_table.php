<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovisionnementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approvisionnements', function (Blueprint $table) {

            $table->increments('id');

            $table->string('facture')->nullable();

            $table->integer('quantite')->nullable();

            $table->double('prix_unitaire')->nullable();

            $table->double('prix_ttc')->nullable();

            $table->date('date');

            $table->boolean('valide')->default(0);

            $table->string('commentaire')->nullable();

            $table->integer('fournisseur_id')->unsigned();

            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('intrant_id')->unsigned();

            $table->foreign('intrant_id')->references('id')->on('intrants')->onDelete('cascade')->onUpdate('cascade');

            $table->dateTime('deleted_at')->nullable();

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
        Schema::dropIfExists('approvisionnements');
    }
}
