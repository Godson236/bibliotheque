<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $livre->titre }} - BiblioTech</title>
    
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary: #7c3aed;
            --light: #f8fafc;
            --dark: #1e293b;
            --gray: #64748b;
            --border: #e2e8f0;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            color: var(--dark);
        }
        
        .breadcrumb {
            background: transparent;
            padding: 1rem 0;
        }
        
        .book-detail-card {
            background: white;
            border-radius: 16px;
            border: 1px solid var(--border);
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }
        
        .book-cover {
            width: 100%;
            height: 400px;
            object-fit: cover;
            background: linear-gradient(135deg, #e0f2fe, #f3e8ff);
        }
        
        .book-meta {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .book-meta li {
            padding: 0.5rem 0;
            border-bottom: 1px solid var(--border);
        }
        
        .book-meta li:last-child {
            border-bottom: none;
        }
        
        .meta-label {
            font-weight: 600;
            color: var(--dark);
            min-width: 120px;
            display: inline-block;
        }
        
        .meta-value {
            color: var(--gray);
        }
        
        .similar-book-card {
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 1rem;
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .similar-book-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        
        .action-buttons .btn {
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top" style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border-bottom: 1px solid #e2e8f0;">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('vitrine.home') }}" style="font-size: 1.8rem; color: #2563eb;">
            <i class="fas fa-book me-2"></i>Biblio<span style="color: #7c3aed;">Tech</span>
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active fw-bold' : '' }}" 
                       href="{{ route('vitrine.home') }}">
                        Accueil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('catalogue') || request()->is('livre/*') || request()->is('categorie/*') ? 'active fw-bold' : '' }}" 
                       href="{{ route('vitrine.catalogue') }}">
                        Catalogue
                    </a>
                </li>
                
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-2"></i>
                            {{ Str::limit(auth()->user()->name, 15) }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ url('/dashboard') }}"><i class="fas fa-tachometer-alt me-2"></i>Tableau de bord</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt me-2"></i>Déconnexion
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('login') ? 'active fw-bold' : '' }}" 
                           href="{{ route('login') }}">
                            Connexion
                        </a>
                    </li>
                    <li class="nav-item ms-2">
                        <a href="{{ route('register') }}" 
                           class="btn btn-primary" 
                           style="background: linear-gradient(135deg, #2563eb, #7c3aed); border: none; padding: 0.5rem 1.5rem; border-radius: 8px;">
                            S'inscrire
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
    <!-- Breadcrumb -->
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('vitrine.home') }}" class="text-decoration-none">
                        <i class="fas fa-home me-1"></i>Accueil
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('vitrine.catalogue') }}" class="text-decoration-none">Catalogue</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('vitrine.categorie', $livre->categorie_id) }}" class="text-decoration-none">
                        {{ $livre->categorie->nom ?? 'Non catégorisé' }}
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ Str::limit($livre->titre, 30) }}
                </li>
            </ol>
        </nav>
    </div>

    <!-- Book Detail -->
    <div class="container py-4">
        <div class="row">
            <!-- Left Column - Book Cover & Actions -->
            <div class="col-lg-4 mb-4">
                <div class="book-detail-card">
                    <!-- Cover -->
                    @if($livre->image)
                        <img src="{{ asset('storage/' . $livre->image) }}" 
                             class="book-cover" 
                             alt="{{ $livre->titre }}">
                    @else
                        <div class="book-cover d-flex flex-column align-items-center justify-content-center p-5">
                            <i class="fas fa-book fa-6x mb-3" style="color: #cbd5e1;"></i>
                            <h4 class="text-center text-muted">{{ $livre->titre }}</h4>
                        </div>
                    @endif
                    
                    <!-- Actions -->
                    <div class="p-4 action-buttons">
                        @if($livre->disponible)
                            @auth
                                @if(auth()->user()->role == 'user')
                                    <button class="btn btn-primary w-100 mb-3" data-bs-toggle="modal" data-bs-target="#borrowModal">
                                        <i class="fas fa-bookmark me-2"></i>Emprunter ce livre
                                    </button>
                                @elseif(auth()->user()->role == 'admin')
                                    <a href="{{ url('/livres/' . $livre->id . '/edit') }}" class="btn btn-primary w-100 mb-3">
                                        <i class="fas fa-edit me-2"></i>Modifier le livre
                                    </a>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary w-100 mb-3">
                                    <i class="fas fa-sign-in-alt me-2"></i>Connectez-vous pour emprunter
                                </a>
                            @endauth
                        @else
                            <button class="btn btn-secondary w-100 mb-3" disabled>
                                <i class="fas fa-times me-2"></i>Indisponible (emprunté)
                            </button>
                        @endif
                        
                        @auth
                            <button class="btn btn-outline-primary w-100">
                                <i class="fas fa-heart me-2"></i>Ajouter aux favoris
                            </button>
                        @else
                            <a href="{{ route('register') }}" class="btn btn-outline-primary w-100">
                                <i class="fas fa-star me-2"></i>Inscrivez-vous pour suivre
                            </a>
                        @endauth
                    </div>
                </div>
            </div>

            <!-- Right Column - Book Details -->
            <div class="col-lg-8">
                <div class="book-detail-card p-4">
                    <!-- Status Badge -->
                    <div class="mb-4">
                        @if($livre->disponible)
                            <span class="badge bg-success py-2 px-3 fs-6">
                                <i class="fas fa-check-circle me-2"></i>Disponible à l'emprunt
                            </span>
                        @else
                            <span class="badge bg-danger py-2 px-3 fs-6">
                                <i class="fas fa-times-circle me-2"></i>Actuellement emprunté
                            </span>
                        @endif
                    </div>

                    <!-- Title -->
                    <h1 class="fw-bold mb-3">{{ $livre->titre }}</h1>
                    
                    <!-- Author -->
                    <div class="d-flex align-items-center mb-4">
                        <i class="fas fa-user-pen fa-lg me-3" style="color: var(--primary);"></i>
                        <div>
                            <h3 class="h5 mb-1">Auteur</h3>
                            <p class="fs-5 mb-0">{{ $livre->auteur }}</p>
                        </div>
                    </div>

                    <!-- Metadata -->
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <ul class="book-meta">
                                <li>
                                    <span class="meta-label">Catégorie :</span>
                                    <span class="meta-value">
                                        {{ $livre->categorie->nom ?? 'Non catégorisé' }}
                                    </span>
                                </li>
                                <li>
                                    <span class="meta-label">Année :</span>
                                    <span class="meta-value">
                                        {{ $livre->annee_publication ?? 'Non spécifiée' }}
                                    </span>
                                </li>
                                <li>
                                    <span class="meta-label">ISBN :</span>
                                    <span class="meta-value">
                                        {{ $livre->isbn ?? 'Non renseigné' }}
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="book-meta">
                                <li>
                                    <span class="meta-label">Exemplaires :</span>
                                    <span class="meta-value">{{ $livre->nombre_exemplaires }}</span>
                                </li>
                                <li>
                                    <span class="meta-label">Emprunts :</span>
                                    <span class="meta-value">{{ $livre->emprunts_count ?? 0 }} fois</span>
                                </li>
                                <li>
                                    <span class="meta-label">Ajouté le :</span>
                                    <span class="meta-value">{{ $livre->created_at->format('d/m/Y') }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-5">
                        <h3 class="h5 mb-3 fw-bold">
                            <i class="fas fa-align-left me-2"></i>Description
                        </h3>
                        <div class="p-3 bg-light rounded">
                            @if($livre->description)
                                <p class="mb-0">{{ $livre->description }}</p>
                            @else
                                <p class="text-muted mb-0">Aucune description disponible pour ce livre.</p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Similar Books -->
                @if($livresSimilaires && $livresSimilaires->count() > 0)
                <div class="mt-5">
                    <h3 class="h5 fw-bold mb-4">
                        <i class="fas fa-book-open me-2"></i>Livres similaires
                    </h3>
                    
                    <div class="row g-3">
                        @foreach($livresSimilaires as $similar)
                        <div class="col-md-3 col-6">
                            <a href="{{ route('vitrine.livre.show', $similar->id) }}" class="text-decoration-none text-dark">
                                <div class="similar-book-card">
                                    <div class="text-center mb-3">
                                        @if($similar->image)
                                            <img src="{{ asset('storage/' . $similar->image) }}" 
                                                 alt="{{ $similar->titre }}"
                                                 class="img-fluid rounded"
                                                 style="height: 120px; object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                                 style="height: 120px;">
                                                <i class="fas fa-book fa-2x text-muted"></i>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <h6 class="fw-bold mb-2">{{ Str::limit($similar->titre, 40) }}</h6>
                                    <p class="small text-muted mb-2">{{ $similar->auteur }}</p>
                                    
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="badge bg-light text-dark small">
                                            {{ $similar->categorie->nom ?? 'Général' }}
                                        </span>
                                        @if($similar->disponible)
                                            <span class="badge bg-success small">Dispo</span>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5 mt-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <h4 class="fw-bold mb-3">
                    <i class="fas fa-book me-2"></i>BiblioTech
                </h4>
                <p class="opacity-75">
                    Plateforme de gestion de bibliothèque numérique développée avec Laravel. 
                    Projet académique collaboratif.
                </p>
                <div class="d-flex gap-3">
                    <a href="#" class="text-white opacity-75">
                        <i class="fab fa-github fa-lg"></i>
                    </a>
                    <a href="#" class="text-white opacity-75">
                        <i class="fab fa-twitter fa-lg"></i>
                    </a>
                </div>
            </div>
            
            <div class="col-lg-2 col-md-4">
                <h5 class="fw-bold mb-3">Navigation</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('vitrine.home') }}" class="text-white-50 text-decoration-none">Accueil</a></li>
                    <li class="mb-2"><a href="{{ route('vitrine.catalogue') }}" class="text-white-50 text-decoration-none">Catalogue</a></li>
                    <li><a href="#features" class="text-white-50 text-decoration-none">Fonctionnalités</a></li>
                </ul>
            </div>
            
            <div class="col-lg-3 col-md-4">
                <h5 class="fw-bold mb-3">Compte</h5>
                <ul class="list-unstyled">
                    @guest
                        <li class="mb-2"><a href="{{ route('login') }}" class="text-white-50 text-decoration-none">Connexion</a></li>
                        <li><a href="{{ route('register') }}" class="text-white-50 text-decoration-none">Inscription</a></li>
                    @else
                        <li class="mb-2"><a href="{{ url('/dashboard') }}" class="text-white-50 text-decoration-none">Tableau de bord</a></li>
                        <li><a href="{{ route('logout') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               class="text-white-50 text-decoration-none">
                            Déconnexion
                        </a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                </ul>
            </div>
            
            <div class="col-lg-3 col-md-4">
                <h5 class="fw-bold mb-3">Projet</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Documentation</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Code source</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Contact</a></li>
                </ul>
            </div>
        </div>
        
        <hr class="bg-white-50 my-4">
        
        <div class="text-center">
            <p class="mb-0 opacity-75">
                &copy; 2024 BiblioTech - Projet développé par <strong>Axel Peboro YANDOBA</strong>
            </p>
            <p class="small opacity-50 mt-2 mb-0">
                Technologies : Laravel 10 • Bootstrap 5 • MySQL • Blade Templates
            </p>
        </div>
    </div>
</footer>
    <!-- Borrow Modal (si connecté) -->
    @auth
    <div class="modal fade" id="borrowModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Emprunter "{{ $livre->titre }}"</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Vous êtes sur le point d'emprunter ce livre.</p>
                    <p class="mb-0"><strong>Date de retour prévue :</strong> {{ now()->addDays(14)->format('d/m/Y') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <form action="{{ url('/emprunts') }}" method="POST">
                        @csrf
                        <input type="hidden" name="livre_id" value="{{ $livre->id }}">
                        <button type="submit" class="btn btn-primary">Confirmer l'emprunt</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endauth

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>