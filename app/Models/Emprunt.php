<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprunt extends Model
{
    use HasFactory;

    protected $fillable = [
        'livre_id', 
        'user_id', 
        'date_emprunt', 
        'date_retour_prevue', 
        'date_retour_effective',  // Note: vous aviez "effective" pas "reelle"
        'statut', 
        'notes'
    ];

    protected $casts = [
        'date_emprunt' => 'date',
        'date_retour_prevue' => 'date',
        'date_retour_effective' => 'date',
    ];

    // Relation avec le livre
    public function livre()
    {
        return $this->belongsTo(Livre::class);
    }

    // Relation avec l'utilisateur - deux options:
    // Option 1: utilisateur (comme vous avez)
    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    // Option 2: user (standard Laravel)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Méthode pour vérifier si l'emprunt est en retard
    public function estEnRetard()
    {
        return $this->statut === 'en_cours' && now()->greaterThan($this->date_retour_prevue);
    }

    // Méthode pour calculer les jours de retard
    public function joursRetard()
    {
        if ($this->estEnRetard()) {
            return now()->diffInDays($this->date_retour_prevue);
        }
        return 0;
    }

    // Méthode pour marquer comme retourné
    public function marquerRetourne()
    {
        $this->update([
            'date_retour_effective' => now(),
            'statut' => 'retourne'
        ]);
        
        // Rendre le livre disponible
        if ($this->livre) {
            $this->livre->update(['disponible' => true]);
        }
    }
}