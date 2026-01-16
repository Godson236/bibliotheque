<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VitrineController;

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
require __DIR__.'/auth.php';

// ==================== ESPACE CONNECTÉ ====================
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Profil utilisateur
    Route::get('/profile', function () {
        return view('profile.edit');
    })->name('profile');
    
    // CRUD Livres (admin seulement)
    Route::resource('livres', 'App\Http\Controllers\LivreController')
        ->middleware('can:admin');
    
    // CRUD Catégories (admin seulement)
    Route::resource('categories', 'App\Http\Controllers\CategorieController')
        ->middleware('can:admin');
    
    // Emprunts (admin et user)
    Route::resource('emprunts', 'App\Http\Controllers\EmpruntController');
});