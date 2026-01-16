<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Emprunt;
use App\Models\Livre;
use App\Models\User;

class EmpruntSeeder extends Seeder
{
    public function run()
    {
        // Assure-toi qu'il y a au moins un utilisateur
        $user = User::first();
        
        if (!$user) {
            // Crée un utilisateur test si aucun n'existe
            $user = User::create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password'),
                'role' => 'user'
            ]);
        }

        // Prends les 3 premiers livres disponibles
        $livres = Livre::where('disponible', true)->take(3)->get();

        if ($livres->count() > 0) {
            $emprunts = [
                [
                    'user_id' => $user->id,
                    'date_emprunt' => now()->subDays(10),
                    'date_retour_prevue' => now()->addDays(20),
                    'statut' => 'en_cours',
                    'notes' => 'Emprunt normal'
                ],
                [
                    'user_id' => $user->id,
                    'date_emprunt' => now()->subDays(5),
                    'date_retour_prevue' => now()->addDays(15),
                    'statut' => 'en_cours',
                    'notes' => 'À rendre bientôt'
                ],
                [
                    'user_id' => $user->id,
                    'date_emprunt' => now()->subDays(30),
                    'date_retour_prevue' => now()->subDays(5),
                    'statut' => 'en_retard',
                    'notes' => 'En retard de 5 jours'
                ]
            ];

            foreach ($livres as $index => $livre) {
                if (isset($emprunts[$index])) {
                    $empruntData = $emprunts[$index];
                    $empruntData['livre_id'] = $livre->id;
                    
                    Emprunt::create($empruntData);
                    
                    // Met à jour la disponibilité du livre
                    $livre->update(['disponible' => false]);
                }
            }
        }
    }
}