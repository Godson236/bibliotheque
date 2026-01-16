<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categorie;

class CategorieSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['nom' => 'Roman', 'description' => 'Romans littéraires'],
            ['nom' => 'Science-Fiction', 'description' => 'Livres de science-fiction'],
            ['nom' => 'Fantasy', 'description' => 'Littérature fantastique'],
            ['nom' => 'Policier', 'description' => 'Romans policiers'],
            ['nom' => 'Biographie', 'description' => 'Biographies et mémoires'],
            ['nom' => 'Histoire', 'description' => 'Livres historiques'],
            ['nom' => 'Science', 'description' => 'Ouvrages scientifiques'],
            ['nom' => 'Informatique', 'description' => 'Livres de programmation et tech'],
        ];

        foreach ($categories as $categorie) {
            Categorie::create($categorie);
        }
    }
}