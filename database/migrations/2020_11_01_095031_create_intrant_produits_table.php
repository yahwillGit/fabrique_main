<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntrantProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intrant_produits', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('quantite_intrant');

            $table->integer('quantite_produit');

            $table->integer('produit_id')->unsigned();

            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('intrant_produits');
    }
}
