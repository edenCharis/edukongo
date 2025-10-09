<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('abonnements', function (Blueprint $table) {
        $table->id();
        $table->foreignId('type_abonnement_id')->constrained()->cascadeOnDelete();
        $table->foreignId('etablissement_id')->constrained()->cascadeOnDelete();
        $table->date('date_debut');
        $table->date('date_fin');
        $table->string('statut')->default('actif');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonnements');
    }
};
