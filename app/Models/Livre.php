<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre', 'auteur', 'isbn', 'description', 
        'annee_publication', 'nombre_exemplaires', 
        'categorie_id', 'disponible', 'image'
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function emprunts()
    {
        return $this->hasMany(Emprunt::class);
    }

    public function empruntsActifs()
    {
        return $this->hasMany(Emprunt::class)->where('statut', 'en_cours');
    }
}