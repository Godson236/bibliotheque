<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprunt;
use App\Models\Livre;
use App\Models\User;

class EmpruntController extends Controller
{
    public function index()
    {
        $emprunts = Emprunt::with(['livre', 'user'])
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('emprunts.index', compact('emprunts'));
    }

    public function create()
    {
        // Livres disponibles seulement
        $livres = Livre::where('disponible', true)->get();
        $users = User::all();
        
        return view('emprunts.create', compact('livres', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'livre_id' => 'required|exists:livres,id',
            'user_id' => 'required|exists:users,id',
            'date_emprunt' => 'required|date',
            'date_retour_prevue' => 'required|date|after:date_emprunt',
            'notes' => 'nullable|string|max:500',
        ]);

        // Créer l'emprunt
        $emprunt = Emprunt::create([
            'livre_id' => $request->livre_id,
            'user_id' => $request->user_id,
            'date_emprunt' => $request->date_emprunt,
            'date_retour_prevue' => $request->date_retour_prevue,
            'statut' => 'en_cours',
            'notes' => $request->notes,
        ]);

        // Marquer le livre comme indisponible
        $livre = Livre::find($request->livre_id);
        $livre->update(['disponible' => false]);

        return redirect()->route('emprunts.index')
            ->with('success', 'Emprunt créé avec succès.');
    }

    public function show(Emprunt $emprunt)
    {
        return view('emprunts.show', compact('emprunt'));
    }

    public function edit(Emprunt $emprunt)
    {
        $livres = Livre::all();
        $users = User::all();
        
        return view('emprunts.edit', compact('emprunt', 'livres', 'users'));
    }

    public function update(Request $request, Emprunt $emprunt)
    {
        $request->validate([
            'date_retour_effective' => 'nullable|date',
            'statut' => 'required|in:en_cours,retourne,en_retard',
            'notes' => 'nullable|string|max:500',
        ]);

        $oldStatut = $emprunt->statut;
        
        $emprunt->update($request->all());

        // Si le statut passe à "retourne", mettre à jour le livre
        if ($request->statut == 'retourne' && $oldStatut != 'retourne') {
            $emprunt->marquerRetourne();
        }

        return redirect()->route('emprunts.index')
            ->with('success', 'Emprunt mis à jour avec succès.');
    }

    public function destroy(Emprunt $emprunt)
    {
        // Rendre le livre disponible si l'emprunt était en cours
        if ($emprunt->statut == 'en_cours' && $emprunt->livre) {
            $emprunt->livre->update(['disponible' => true]);
        }
        
        $emprunt->delete();

        return redirect()->route('emprunts.index')
            ->with('success', 'Emprunt supprimé avec succès.');
    }

    // Méthode pour marquer un retour
    public function retourner(Emprunt $emprunt)
    {
        $emprunt->marquerRetourne();
        
        return redirect()->route('emprunts.index')
            ->with('success', 'Livre marqué comme retourné.');
    }
}