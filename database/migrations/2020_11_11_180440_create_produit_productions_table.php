<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_productions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qte_reel')->nullable();
            $table->integer('qte')->nullable();
            $table->integer('produit_id')->unsigned();

            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('production_id')->unsigned();

            $table->foreign('production_id')->references('id')->on('productions')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('produit_productions');
    }
}
