<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
 use HasFactory;

    // Attributs autorisés en assignation de masse
    protected $fillable = [
        'titre',
        'description',
    ];

    /**
     * Relation Many-to-Many avec les ingrédients.
     * Par défaut, Laravel suppose que la table pivot s'appelle 'recette_ingredient'.
     * Si c'est bien le cas, cette relation est correcte.
     */
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }}
