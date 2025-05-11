<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    // Autoriser ces champs à être remplis
    protected $fillable = ['nom', 'calories', 'proteine'];

    // Définir la relation many-to-many avec Recette
    public function recettes()
    {
        return $this->belongsToMany(Recette::class, 'ingredient_recette');
    }
}
