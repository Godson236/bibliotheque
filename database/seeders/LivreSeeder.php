<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Livre;
use App\Models\Categorie;

class LivreSeeder extends Seeder
{
    public function run()
    {
        $categories = Categorie::all();

        $livres = [
            [
                'titre' => 'Le Petit Prince',
                'auteur' => 'Antoine de Saint-Exupéry',
                'isbn' => '9782070612758',
                'description' => 'Un classique de la littérature française.',
                'annee_publication' => 1943,
                'nombre_exemplaires' => 5,
                'disponible' => true,
            ],
            [
                'titre' => '1984',
                'auteur' => 'George Orwell',
                'isbn' => '9782070368227',
                'description' => 'Roman dystopique célèbre.',
                'annee_publication' => 1949,
                'nombre_exemplaires' => 3,
                'disponible' => true,
            ],
            [
                'titre' => 'Fondation',
                'auteur' => 'Isaac Asimov',
                'isbn' => '9782290110667',
                'description' => 'Trilogie de science-fiction.',
                'annee_publication' => 1951,
                'nombre_exemplaires' => 4,
                'disponible' => true,
            ],
            [
                'titre' => 'Le Seigneur des Anneaux',
                'auteur' => 'J.R.R. Tolkien',
                'isbn' => '9782266280012',
                'description' => 'Épopée fantastique en trois volumes.',
                'annee_publication' => 1954,
                'nombre_exemplaires' => 2,
                'disponible' => true,
            ],
            [
                'titre' => 'Les Misérables',
                'auteur' => 'Victor Hugo',
                'isbn' => '9782253004249',
                'description' => 'Roman historique français.',
                'annee_publication' => 1862,
                'nombre_exemplaires' => 3,
                'disponible' => true,
            ],
        ];

        foreach ($livres as $index => $livre) {
            $livre['categorie_id'] = $categories[$index % count($categories)]->id;
            Livre::create($livre);
        }
    }
}
