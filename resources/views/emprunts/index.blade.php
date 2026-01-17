<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Emprunts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>📚 Gestion des Emprunts</h1>
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="mb-4">
            <a href="{{ route('emprunts.create') }}" class="btn btn-primary">
                + Nouvel emprunt
            </a>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                ← Retour au tableau de bord
            </a>
        </div>

        @if($emprunts && $emprunts->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Livre</th>
                        <th>Utilisateur</th>
                        <th>Date emprunt</th>
                        <th>Date retour</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($emprunts as $emprunt)
                    <tr>
                        <td>{{ $emprunt->id }}</td>
                        <td>
                            <strong>{{ $emprunt->livre->titre ?? 'Livre inconnu' }}</strong><br>
                            <small class="text-muted">Auteur: {{ $emprunt->livre->auteur ?? 'N/A' }}</small>
                        </td>
                        <td>{{ $emprunt->user->name ?? 'Utilisateur inconnu' }}</td>
                        <td>{{ \Carbon\Carbon::parse($emprunt->date_emprunt)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($emprunt->date_retour_prevue)->format('d/m/Y') }}</td>
                        <td>
                            @if($emprunt->statut == 'en_cours')
                                <span class="badge bg-primary">En cours</span>
                            @elseif($emprunt->statut == 'retourne')
                                <span class="badge bg-success">Retourné</span>
                            @elseif($emprunt->statut == 'en_retard')
                                <span class="badge bg-danger">En retard</span>
                            @endif
                            
                            @if($emprunt->estEnRetard())
                                <br><small class="text-danger">
                                    Retard: {{ $emprunt->joursRetard() }} jours
                                </small>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('emprunts.show', $emprunt) }}" class="btn btn-info btn-sm">
                                    👁️ Voir
                                </a>
                                <a href="{{ route('emprunts.edit', $emprunt) }}" class="btn btn-warning btn-sm">
                                    ✏️ Modifier
                                </a>
                                
                                @if($emprunt->statut == 'en_cours')
                                <form action="{{ route('emprunts.retourner', $emprunt) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm" 
                                            onclick="return confirm('Marquer ce livre comme retourné?')">
                                        📥 Retourner
                                    </button>
                                </form>
                                @endif
                                
                                <form action="{{ route('emprunts.destroy', $emprunt) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" 
                                            onclick="return confirm('Supprimer cet emprunt?')">
                                        🗑️ Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="mt-3">
            <p>Total: {{ $emprunts->count() }} emprunt(s)</p>
        </div>
        @else
        <div class="alert alert-info">
            <h4>📭 Aucun emprunt trouvé</h4>
            <p>Il n'y a actuellement aucun emprunt dans le système.</p>
            <a href="{{ route('emprunts.create') }}" class="btn btn-primary">
                Créer le premier emprunt
            </a>
        </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>