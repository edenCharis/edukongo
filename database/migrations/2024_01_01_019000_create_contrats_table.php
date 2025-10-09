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
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enseignant_id')->constrained('enseignants')->onDelete('cascade');
            $table->foreignId('annee_id')->constrained('annees')->onDelete('cascade');
            $table->enum('type_contrat', ['CDI', 'CDD', 'vacation']);
            $table->date('date_debut');
            $table->date('date_fin')->nullable();
            $table->decimal('salaire', 10, 2);
            $table->text('conditions')->nullable();
            $table->enum('statut', ['actif', 'expire', 'resilie'])->default('actif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrats');
    }
};
