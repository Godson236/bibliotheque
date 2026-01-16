<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil - BiblioTech</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary: #7c3aed;
            --light: #f8fafc;
            --dark: #1e293b;
            --gray: #64748b;
            --border: #e2e8f0;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            color: var(--dark);
            background: linear-gradient(135deg, #f8fafc 0%, #e0f2fe 100%);
            min-height: 100vh;
        }
        
        h1, h2, h3, h4, h5 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
        }
        
        .profile-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 100px 20px 50px;
        }
        
        .profile-header {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--border);
            position: relative;
            overflow: hidden;
        }
        
        .profile-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }
        
        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            margin-bottom: 1.5rem;
            border: 5px solid white;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .profile-name {
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
            color: var(--dark);
        }
        
        .profile-email {
            color: var(--gray);
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
        }
        
        .profile-role {
            display: inline-block;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .role-admin {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
        }
        
        .role-user {
            background: linear-gradient(135deg, var(--success), #10b981);
            color: white;
        }
        
        .profile-stats {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--border);
        }
        
        .stat-card {
            text-align: center;
            padding: 1.5rem;
            border-radius: 15px;
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }
        
        .stat-card:hover {
            border-color: var(--primary);
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .stat-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--primary);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.5rem;
            line-height: 1;
        }
        
        .stat-label {
            color: var(--gray);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }
        
        .profile-sections {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .profile-section {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--border);
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--border);
        }
        
        .section-title {
            font-size: 1.5rem;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .section-title i {
            color: var(--primary);
        }
        
        .btn-edit {
            background: var(--light);
            color: var(--primary);
            border: 2px solid var(--primary);
            padding: 0.5rem 1.25rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-edit:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.2);
        }
        
        .info-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .info-item {
            padding: 1rem 0;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .info-item:last-child {
            border-bottom: none;
        }
        
        .info-label {
            font-weight: 600;
            color: var(--dark);
            min-width: 150px;
        }
        
        .info-value {
            color: var(--gray);
            text-align: right;
        }
        
        .badge-date {
            background: var(--light);
            color: var(--dark);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        
        .book-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
            background: var(--light);
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
        }
        
        .book-item:hover {
            background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transform: translateX(5px);
        }
        
        .book-cover {
            width: 60px;
            height: 80px;
            border-radius: 8px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            flex-shrink: 0;
        }
        
        .book-info {
            flex: 1;
        }
        
        .book-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
            color: var(--dark);
        }
        
        .book-author {
            color: var(--gray);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }
        
        .book-status {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .status-active {
            background: #dcfce7;
            color: #166534;
        }
        
        .status-overdue {
            background: #fee2e2;
            color: #991b1b;
        }
        
        .status-returned {
            background: #e0f2fe;
            color: #1e40af;
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: var(--gray);
        }
        
        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
        
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .action-btn {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            background: white;
            border: 2px solid var(--border);
            color: var(--dark);
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 600;
        }
        
        .action-btn:hover {
            border-color: var(--primary);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            color: var(--primary);
        }
        
        .action-btn i {
            font-size: 1.25rem;
        }
        
        .action-btn-danger {
            border-color: var(--danger);
            color: var(--danger);
        }
        
        .action-btn-danger:hover {
            background: var(--danger);
            color: white;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .profile-container {
                padding: 80px 15px 30px;
            }
            
            .profile-header {
                padding: 1.5rem;
                text-align: center;
            }
            
            .profile-sections {
                grid-template-columns: 1fr;
            }
            
            .profile-section {
                padding: 1.5rem;
            }
            
            .stat-card {
                padding: 1rem;
            }
            
            .stat-number {
                font-size: 2rem;
            }
        }
        
        @media (max-width: 480px) {
            .profile-name {
                font-size: 1.75rem;
            }
            
            .info-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
            
            .info-value {
                text-align: left;
            }
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
                                <li><a class="dropdown-item" href="{{ url('/profile') }}"><i class="fas fa-user-cog me-2"></i>Mon profil</a></li>
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

    <!-- Main Content -->
    <div class="profile-container">
        <!-- Header -->
        <div class="profile-header">
            <div class="row align-items-center">
                <div class="col-md-3 text-center text-md-start">
                    <div class="profile-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                <div class="col-md-6 text-center text-md-start">
                    <h1 class="profile-name">{{ auth()->user()->name }}</h1>
                    <p class="profile-email">
                        <i class="fas fa-envelope me-2"></i>{{ auth()->user()->email }}
                    </p>
                    <span class="profile-role {{ auth()->user()->role == 'admin' ? 'role-admin' : 'role-user' }}">
                        <i class="fas fa-shield-alt me-2"></i>
                        {{ auth()->user()->role == 'admin' ? 'Administrateur' : 'Utilisateur' }}
                    </span>
                </div>
                <div class="col-md-3 text-center text-md-end mt-3 mt-md-0">
                    <a href="#" class="btn-edit">
                        <i class="fas fa-edit"></i>Modifier le profil
                    </a>
                </div>
            </div>
        </div>

        <!-- Stats -->
        <div class="profile-stats">
            <div class="row">
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="stat-number">12</div>
                        <div class="stat-label">Livres lus</div>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-bookmark"></i>
                        </div>
                        <div class="stat-number">3</div>
                        <div class="stat-label">En cours</div>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-number">1</div>
                        <div class="stat-label">En retard</div>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="stat-number">8</div>
                        <div class="stat-label">Favoris</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Sections -->
        <div class="profile-sections">
            <!-- Informations personnelles -->
            <div class="profile-section">
                <div class="section-header">
                    <h3 class="section-title">
                        <i class="fas fa-id-card"></i>Informations personnelles
                    </h3>
                    <a href="#" class="btn-edit">
                        <i class="fas fa-edit"></i>Modifier
                    </a>
                </div>
                
                <ul class="info-list">
                    <li class="info-item">
                        <span class="info-label">Nom complet</span>
                        <span class="info-value">{{ auth()->user()->name }}</span>
                    </li>
                    <li class="info-item">
                        <span class="info-label">Adresse email</span>
                        <span class="info-value">{{ auth()->user()->email }}</span>
                    </li>
                    <li class="info-item">
                        <span class="info-label">Rôle</span>
                        <span class="info-value">
                            <span class="badge {{ auth()->user()->role == 'admin' ? 'bg-primary' : 'bg-success' }}">
                                {{ auth()->user()->role == 'admin' ? 'Administrateur' : 'Utilisateur' }}
                            </span>
                        </span>
                    </li>
                    <li class="info-item">
                        <span class="info-label">Membre depuis</span>
                        <span class="info-value">
                            <span class="badge-date">
                                {{ auth()->user()->created_at->format('d/m/Y') }}
                            </span>
                        </span>
                    </li>
                    <li class="info-item">
                        <span class="info-label">Dernière connexion</span>
                        <span class="info-value">
                            <span class="badge-date">
                                {{ now()->format('d/m/Y à H:i') }}
                            </span>
                        </span>
                    </li>
                </ul>
            </div>

            <!-- Emprunts en cours -->
            <div class="profile-section">
                <div class="section-header">
                    <h3 class="section-title">
                        <i class="fas fa-history"></i>Emprunts en cours
                    </h3>
                    <a href="{{ route('vitrine.catalogue') }}" class="btn-edit">
                        <i class="fas fa-plus"></i>Nouvel emprunt
                    </a>
                </div>
                
                @if(isset($emprunts) && $emprunts->count() > 0)
                    @foreach($emprunts->take(3) as $emprunt)
                    <a href="#" class="book-item">
                        <div class="book-cover">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="book-info">
                            <h4 class="book-title">{{ $emprunt->livre->titre ?? 'Livre inconnu' }}</h4>
                            <p class="book-author">{{ $emprunt->livre->auteur ?? 'Auteur inconnu' }}</p>
                            <span class="book-status status-active">
                                À rendre le {{ $emprunt->date_retour_prevue->format('d/m/Y') }}
                            </span>
                        </div>
                    </a>
                    @endforeach
                    
                    @if($emprunts->count() > 3)
                    <div class="text-center mt-3">
                        <a href="#" class="btn-edit">
                            Voir les {{ $emprunts->count() - 3 }} autres
                        </a>
                    </div>
                    @endif
                @else
                    <div class="empty-state">
                        <i class="fas fa-book-open"></i>
                        <h4>Aucun emprunt en cours</h4>
                        <p>Explorez notre catalogue pour découvrir de nouveaux livres !</p>
                        <a href="{{ route('vitrine.catalogue') }}" class="btn-edit mt-2">
                            <i class="fas fa-search me-2"></i>Explorer le catalogue
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="profile-section">
            <h3 class="section-title mb-4">
                <i class="fas fa-bolt"></i>Actions rapides
            </h3>
            
            <div class="quick-actions">
                <a href="{{ route('vitrine.catalogue') }}" class="action-btn">
                    <i class="fas fa-search"></i>
                    <span>Rechercher un livre</span>
                </a>
                
                @if(auth()->user()->role == 'admin')
                <a href="{{ url('/dashboard') }}" class="action-btn">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Tableau de bord Admin</span>
                </a>
                
                <a href="{{ url('/livres/create') }}" class="action-btn">
                    <i class="fas fa-plus"></i>
                    <span>Ajouter un livre</span>
                </a>
                @endif
                
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="action-btn action-btn-danger">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Déconnexion</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="text-center">
                <p class="mb-0">
                    &copy; 2024 BiblioTech - Projet développé par <strong>Axel Peboro YANDOBA</strong>
                </p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Animation des cartes de stats
        document.addEventListener('DOMContentLoaded', function() {
            const statCards = document.querySelectorAll('.stat-card');
            statCards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 200);
            });
            
            // Initial state for animation
            statCards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            });
        });
    </script>
</body>
</html>