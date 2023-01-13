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
        Schema::create('tache', function (Blueprint $table) {
            $table->id();
            $table->string('Etat')->default('en pouse');
            $table->timestamp("date_debut")->nullable();
            $table->timestamp("date_fin")->nullable();

            $table->foreignId('preparation_tache_id')
                ->constrained('preparation_tache')
                ->onDelete('cascade');

            $table->foreignId('Apprenant_id')
                ->constrained('apprenant')
                ->onDelete('cascade');

            // $table->foreignId('preparation_brief_id')
            //     ->constrained('preparation_brief')
            //     ->onDelete('cascade');
                
            $table->foreignId('apprenant_P_brief_id')
                ->constrained('brief')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tache');
    }
};
