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
        Schema::create('compagnes', function (Blueprint $table) {
            $table->id();
            $table->string('titre_compagne');
            $table->enum('type', ['Horizontale', 'Verticale']);
            $table->date('date_debut');
            $table->date('date_fin');
            $table->text('description')->nullable();
            $table->enum('status', ['En cours', 'Planifiée', 'Clôturée'])->default('Planifiée');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compagnes');
    }
};
