<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Categorie;
use App\Models\Emprunt;
use App\Models\User;
use Illuminate\Http\Request;

class VitrineController extends Controller
{
    // Page d'accueil
    public function index()
    {
        $totalLivres = Livre::count();
        $totalCategories = Categorie::count();
        $livresDisponibles = Livre::where('disponible', true)->count();
        $totalEmprunts = Emprunt::count();
        $totalUsers = User::count();
        
        $livresRecents = Livre::with('categorie')
            ->where('disponible', true)
            ->latest()
            ->take(8)
            ->get();
        
        $categories = Categorie::withCount('livres')
            ->having('livres_count', '>', 0)
            ->orderBy('livres_count', 'desc')
            ->take(8)
            ->get();

        return view('welcome', compact(
            'totalLivres',
            'totalCategories',
            'livresDisponibles',
            'totalEmprunts',
            'totalUsers',
            'livresRecents',
            'categories'
        ));
    }

    // Catalogue complet
    public function catalogue(Request $request)
    {
        $query = Livre::with('categorie');
        
        // Filtre par recherche
        if ($request->has('q') && $request->q != '') {
            $search = $request->q;
            $query->where(function($q) use ($search) {
                $q->where('titre', 'like', "%$search%")
                  ->orWhere('auteur', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%")
                  ->orWhereHas('categorie', function($q) use ($search) {
                      $q->where('nom', 'like', "%$search%");
                  });
            });
        }
        
        // Filtre par catégorie
        if ($request->has('categorie_id')) {
            $query->where('categorie_id', $request->categorie_id);
        }
        
        // Filtre par disponibilité
        if ($request->has('disponible')) {
            $query->where('disponible', $request->disponible == '1');
        }
        
        // Tri
        $sort = $request->get('sort', 'recent');
        switch ($sort) {
            case 'titre':
                $query->orderBy('titre');
                break;
            case 'auteur':
                $query->orderBy('auteur');
                break;
            case 'ancien':
                $query->orderBy('created_at');
                break;
            default:
                $query->latest();
        }
        
        $livres = $query->paginate(12);
        $categories = Categorie::all();
        
        return view('vitrine.catalogue', compact('livres', 'categories'));
    }

    // Détails d'un livre
    public function showLivre($id)
    {
        $livre = Livre::with(['categorie', 'emprunts.utilisateur'])
            ->findOrFail($id);
        
        // Livres similaires (même catégorie)
        $livresSimilaires = Livre::where('categorie_id', $livre->categorie_id)
            ->where('id', '!=', $livre->id)
            ->where('disponible', true)
            ->take(4)
            ->get();
        
        return view('vitrine.livre-show', compact('livre', 'livresSimilaires'));
    }

    // Livres par catégorie
    public function categorie($id)
    {
        $categorie = Categorie::withCount('livres')->findOrFail($id);
        $livres = Livre::where('categorie_id', $id)
            ->with('categorie')
            ->paginate(12);
        
        return view('vitrine.categorie', compact('categorie', 'livres'));
    }

    // Recherche
    public function search(Request $request)
    {
        return $this->catalogue($request);
    }
}