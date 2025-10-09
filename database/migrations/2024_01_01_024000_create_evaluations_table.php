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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('matiere_id')->constrained('matieres')->onDelete('cascade');
            $table->foreignId('trimestre_id')->constrained('trimestres')->onDelete('cascade');
            $table->foreignId('type_evaluation_id')->constrained('type_evaluations')->onDelete('cascade');
            $table->foreignId('inscription_id')->constrained('inscriptions')->onDelete('cascade');
            $table->decimal('note', 5, 2);
            $table->decimal('note_sur', 5, 2)->default(20);
            $table->date('date_evaluation');
            $table->text('observation')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
