<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue complet - BiblioTech</title>
    
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
        
        .page-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 4rem 0;
            margin-bottom: 3rem;
        }
        
        .book-card {
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .book-image {
            height: 250px;
            width: 100%;
            object-fit: cover;
            background: linear-gradient(135deg, #e0f2fe, #f3e8ff);
        }
        
        .book-content {
            padding: 1.5rem;
        }
        
        .book-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }
        
        .book-author {
            color: var(--gray);
            font-size: 0.9rem;
            margin-bottom: 0.75rem;
        }
        
        .book-category {
            display: inline-block;
            background: var(--light);
            color: var(--primary);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
        }
        
        .filter-sidebar {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            border: 1px solid var(--border);
        }
        
        .pagination .page-link {
            border-radius: 8px;
            margin: 0 3px;
            border: 1px solid var(--border);
        }
        
        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-color: transparent;
        }
        
        .empty-state {
            padding: 4rem 2rem;
            text-align: center;
        }
        
        .empty-state-icon {
            font-size: 4rem;
            color: var(--gray);
            margin-bottom: 1.5rem;
            opacity: 0.5;
        }
    </style>
</head>
<body>
    <!-- Navigation (reprise de la page d'accueil) -->
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

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold mb-3">Catalogue complet</h1>
                    <p class="lead mb-0 opacity-90">
                        {{ $livres->total() }} livre{{ $livres->total() > 1 ? 's' : '' }} disponible{{ $livres->total() > 1 ? 's' : '' }}
                    </p>
                </div>
                <div class="col-md-4">
                    <form action="{{ route('vitrine.catalogue') }}" method="GET" class="input-group">
                        <input type="text" name="q" class="form-control" 
                               placeholder="Titre, auteur, catégorie..."
                               value="{{ request('q') }}">
                        <button class="btn btn-light" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mb-5">
        <div class="row">
            <!-- Sidebar Filters -->
            <div class="col-lg-3 mb-4">
                <div class="filter-sidebar sticky-top" style="top: 20px;">
                    <h5 class="mb-3 fw-bold">Filtres</h5>
                    
                    <form method="GET" action="{{ route('vitrine.catalogue') }}">
                        <!-- Search -->
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Recherche</label>
                            <input type="text" name="q" class="form-control form-control-sm" 
                                   placeholder="Rechercher..." value="{{ request('q') }}">
                        </div>
                        
                        <!-- Category -->
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Catégorie</label>
                            <select name="categorie_id" class="form-select form-select-sm">
                                <option value="">Toutes les catégories</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" 
                                        {{ request('categorie_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Availability -->
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Disponibilité</label>
                            <select name="disponible" class="form-select form-select-sm">
                                <option value="">Tous</option>
                                <option value="1" {{ request('disponible') == '1' ? 'selected' : '' }}>
                                    Disponibles seulement
                                </option>
                                <option value="0" {{ request('disponible') == '0' ? 'selected' : '' }}>
                                    Empruntés
                                </option>
                            </select>
                        </div>
                        
                        <!-- Sort -->
                        <div class="mb-4">
                            <label class="form-label small fw-bold">Trier par</label>
                            <select name="sort" class="form-select form-select-sm">
                                <option value="recent" {{ request('sort') == 'recent' ? 'selected' : '' }}>
                                    Plus récents
                                </option>
                                <option value="titre" {{ request('sort') == 'titre' ? 'selected' : '' }}>
                                    Titre (A-Z)
                                </option>
                                <option value="auteur" {{ request('auteur') == 'auteur' ? 'selected' : '' }}>
                                    Auteur (A-Z)
                                </option>
                                <option value="ancien" {{ request('sort') == 'ancien' ? 'selected' : '' }}>
                                    Plus anciens
                                </option>
                            </select>
                        </div>
                        
                        <!-- Actions -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-filter me-2"></i>Appliquer les filtres
                            </button>
                            <a href="{{ route('vitrine.catalogue') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-redo me-2"></i>Réinitialiser
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Books Grid -->
            <div class="col-lg-9">
                @if($livres->count() > 0)
                    <div class="row g-4">
                        @foreach($livres as $livre)
                        <div class="col-md-4 col-lg-4">
                            <a href="{{ route('vitrine.livre.show', $livre->id) }}" class="text-decoration-none text-dark">
                                <div class="book-card h-100">
                                    <!-- Image -->
                                    @if($livre->image)
                                        <img src="{{ asset('storage/' . $livre->image) }}" 
                                             class="book-image" 
                                             alt="{{ $livre->titre }}">
                                    @else
                                        <div class="book-image d-flex align-items-center justify-content-center">
                                            <i class="fas fa-book fa-4x" style="color: #cbd5e1;"></i>
                                        </div>
                                    @endif
                                    
                                    <!-- Content -->
                                    <div class="book-content">
                                        <span class="book-category">
                                            {{ $livre->categorie->nom ?? 'Non catégorisé' }}
                                        </span>
                                        
                                        <h3 class="book-title">{{ Str::limit($livre->titre, 50) }}</h3>
                                        <p class="book-author">{{ $livre->auteur }}</p>
                                        
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="small text-muted">
                                                <i class="fas fa-calendar me-1"></i> 
                                                {{ $livre->annee_publication ?? 'N/A' }}
                                            </span>
                                            
                                            @if($livre->disponible)
                                                <span class="badge bg-success">
                                                    <i class="fas fa-check me-1"></i>Disponible
                                                </span>
                                            @else
                                                <span class="badge bg-secondary">
                                                    <i class="fas fa-times me-1"></i>Emprunté
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-5">
                        {{ $livres->withQueryString()->links() }}
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="empty-state">
                        <div class="empty-state-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3 class="mb-3">Aucun livre trouvé</h3>
                        <p class="text-muted mb-4">
                            Essayez avec d'autres termes de recherche ou modifiez vos filtres.
                        </p>
                        <a href="{{ route('vitrine.catalogue') }}" class="btn btn-primary">
                            <i class="fas fa-redo me-2"></i>Voir tous les livres
                        </a>
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
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-submit filters on change
        document.querySelectorAll('select[name="categorie_id"], select[name="disponible"], select[name="sort"]')
            .forEach(select => {
                select.addEventListener('change', function() {
                    this.closest('form').submit();
                });
            });
    </script>
</body>
</html>