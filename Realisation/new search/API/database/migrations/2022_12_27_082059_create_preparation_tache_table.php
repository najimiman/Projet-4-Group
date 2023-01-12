<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preparation_tache', function (Blueprint $table) {
            $table->increments('id');
            $table->string("Nom_tache")->nullable();
            $table->string("Description")->nullable();
            $table->integer("Duree")->nullable();

            $table->unsignedInteger("Preparation_brief_id")->nullable();
            $table->foreign("Preparation_brief_id")
            ->references("id")
            ->on('preparation_brief')
            ->onDelete('cascade');
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
        Schema::dropIfExists('preparation_tache');
    }
};
