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
        Schema::create('type_classes', function (Blueprint $table) {
            $table->id();
            $table->string('libelle'); // Ex: CP1, CE1, 6ème
            $table->text('description')->nullable();
            $table->foreignId('cycle_id')->constrained('cycles')->onDelete('cascade');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_classes');
    }
};
