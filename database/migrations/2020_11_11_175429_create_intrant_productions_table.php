<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntrantProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intrant_productions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qte');

            $table->integer('production_id')->unsigned();

            $table->foreign('production_id')->references('id')->on('productions')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('intrant_productions');
    }
}
