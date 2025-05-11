<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
      use HasFactory;

    // Les champs autorisés pour l'insertion en masse
    protected $fillable = ['user_id', 'recette_id', 'jour', 'repas'];  // Ajoute ici les champs de ta table

    // Relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class); // Un plan appartient à un utilisateur
    }

    // Relation avec le modèle Recette
    public function recette()
    {
        return $this->belongsTo(Recette::class); // Un plan appartient à une recette
    }
}
