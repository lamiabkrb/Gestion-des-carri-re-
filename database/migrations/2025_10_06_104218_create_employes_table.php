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
        Schema::create('employes', function (Blueprint $table) {
            $table->string('matricule')->primary(); // clé primaire personnalisée
            $table->string('nom');
            $table->string('prenom');
            $table->string('poste');
            $table->string('departement');
            $table->date('date_recrutement');
            $table->date('date_dernier_echelon')->nullable();
            $table->integer('echelon')->default(1);
            $table->integer('cpt')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employes');
    }
};
