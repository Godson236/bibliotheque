<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VitrineController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EmpruntController;

// ==================== VITRINE PUBLIQUE ====================
Route::name('vitrine.')->group(function () {
    // Page d'accueil
    Route::get('/', [VitrineController::class, 'index'])->name('home');
    
    // Catalogue
    Route::get('/catalogue', [VitrineController::class, 'catalogue'])->name('catalogue');
    
    // Détail d'un livre
    Route::get('/livre/{id}', [VitrineController::class, 'showLivre'])->name('livre.show');
    
    // Catégorie spécifique
    Route::get('/categorie/{id}', [VitrineController::class, 'categorie'])->name('categorie');
    
    // Recherche
    Route::get('/rechercher', [VitrineController::class, 'search'])->name('search');
});

// ==================== AUTHENTIFICATION ====================
// Ce fichier contient déjà : login, register, logout, etc.
require __DIR__.'/auth.php';

// ==================== ESPACE CONNECTÉ ====================
Route::middleware(['auth'])->group(function () {
    // Dashboard - utiliser votre vue personnalisée
    Route::get('/dashboard', function () {
        return view('dashboard'); // Votre tableau de bord personnalisé
    })->name('dashboard');
    
    // Profil utilisateur
    Route::get('/profile', function () {
        return view('profile.edit');
    })->name('profile');
    
    // CRUD Livres (admin seulement)
    Route::resource('livres', LivreController::class)
        ->middleware('can:admin');
    
    // CRUD Catégories (admin seulement)
    Route::resource('categories', CategorieController::class)
        ->middleware('can:admin');
    
    // Emprunts (admin et user)
    Route::resource('emprunts', EmpruntController::class);
    
    // Route spécifique pour retourner un emprunt
    Route::post('/emprunts/{emprunt}/retourner', [EmpruntController::class, 'retourner'])
        ->name('emprunts.retourner');
});