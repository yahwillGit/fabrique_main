<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employe_productions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employe_id')->unsigned();

            $table->foreign('employe_id')->references('id')->on('employes')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('employe_productions');
    }
}
