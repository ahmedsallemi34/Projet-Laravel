<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id(); // Colonne id auto-incrémentée

            // Clé étrangère pour l'utilisateur (user_id)
            // Lier la table `plans_alimentaires` à la table `users` via `user_id`
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Clé étrangère pour la recette (recette_id)
            // Lier la table `plans_alimentaires` à la table `recettes` via `recette_id`
            $table->foreignId('recette_id')->constrained('recettes')->onDelete('cascade');

            // Champs supplémentaires pour le jour et le type de repas
            $table->string('jour'); // Jour (Lundi, Mardi, etc.)
            $table->string('repas'); // Type de repas (petit-déjeuner, déjeuner, dîner)

            // Les champs timestamps généreront `created_at` et `updated_at`
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
        Schema::dropIfExists('plans');
    }
}
