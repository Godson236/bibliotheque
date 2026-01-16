<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprunt extends Model
{
    use HasFactory;

    protected $fillable = [
        'livre_id', 'user_id', 'date_emprunt', 
        'date_retour_prevue', 'date_retour_effective', 
        'statut', 'notes'
    ];

    protected $casts = [
        'date_emprunt' => 'date',
        'date_retour_prevue' => 'date',
        'date_retour_effective' => 'date',
    ];

    public function livre()
    {
        return $this->belongsTo(Livre::class);
    }

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Méthode pour vérifier si l'emprunt est en retard
    public function estEnRetard()
    {
        return $this->statut === 'en_cours' && now()->greaterThan($this->date_retour_prevue);
    }
}