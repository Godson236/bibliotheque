<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Bibliothèque') }}</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background-color: #f8f9fa;
            }
            .sidebar {
                min-height: 100vh;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                padding-top: 20px;
            }
            .sidebar a {
                color: white;
                text-decoration: none;
                display: block;
                padding: 12px 20px;
                margin: 5px 10px;
                border-radius: 8px;
                transition: all 0.3s;
            }
            .sidebar a:hover {
                background: rgba(255, 255, 255, 0.2);
                transform: translateX(5px);
            }
            .sidebar a.active {
                background: rgba(255, 255, 255, 0.3);
                font-weight: bold;
            }
            .sidebar .logo {
                text-align: center;
                padding: 20px;
                font-size: 1.5rem;
                font-weight: bold;
                border-bottom: 1px solid rgba(255, 255, 255, 0.2);
                margin-bottom: 20px;
            }
            .main-content {
                padding: 30px;
            }
            .navbar-custom {
                background: white;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                padding: 15px 0;
            }
            .card-custom {
                border: none;
                border-radius: 15px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.08);
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3 col-lg-2 sidebar d-md-block">
                    <div class="logo">
                        <i class="fas fa-book me-2"></i>BiblioTech
                    </div>
                    
                    <!-- Navigation -->
                    <a href="{{ url('/dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt me-2"></i>Tableau de bord
                    </a>
                    
                    <!-- Liens Admin -->
                    @if(auth()->check() && auth()->user()->role == 'admin')
                        <a href="{{ url('/livres') }}" class="{{ request()->is('livres*') ? 'active' : '' }}">
                            <i class="fas fa-book me-2"></i>Gestion des Livres
                        </a>
                        <a href="{{ url('/categories') }}" class="{{ request()->is('categories*') ? 'active' : '' }}">
                            <i class="fas fa-tags me-2"></i>Catégories
                        </a>
                        <a href="{{ url('/emprunts') }}" class="{{ request()->is('emprunts*') ? 'active' : '' }}">
                            <i class="fas fa-exchange-alt me-2"></i>Emprunts
                        </a>
                        <a href="{{ url('/users') }}" class="{{ request()->is('users*') ? 'active' : '' }}">
                            <i class="fas fa-users me-2"></i>Utilisateurs
                        </a>
                    @endif
                    
                    <!-- Liens Utilisateur -->
                    @if(auth()->check() && auth()->user()->role == 'user')
                        <a href="{{ url('/catalogue') }}">
                            <i class="fas fa-search me-2"></i>Catalogue
                        </a>
                        <a href="{{ url('/mes-emprunts') }}">
                            <i class="fas fa-history me-2"></i>Mes Emprunts
                        </a>
                    @endif
                    
                    <!-- Liens communs -->
                    <div class="mt-5">
                        <a href="{{ url('/profile') }}">
                            <i class="fas fa-user me-2"></i>Mon Profil
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <a href="{{ route('logout') }}" 
                               onclick="event.preventDefault(); this.closest('form').submit();"
                               class="text-danger">
                                <i class="fas fa-sign-out-alt me-2"></i>Déconnexion
                            </a>
                        </form>
                    </div>
                    
                    <!-- Info utilisateur -->
                    <div class="mt-5 pt-5 px-3">
                        <small>
                            <i class="fas fa-user-circle me-1"></i> 
                            {{ auth()->user()->name ?? 'Invité' }}
                            <br>
                            <i class="fas fa-shield-alt me-1 mt-2"></i>
                            {{ auth()->user()->role == 'admin' ? 'Administrateur' : 'Utilisateur' }}
                        </small>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-md-9 col-lg-10 ms-sm-auto px-0">
                    <!-- Top Navbar -->
                    <nav class="navbar navbar-custom">
                        <div class="container-fluid">
                            <span class="navbar-brand mb-0 h1">
                                <i class="fas fa-home me-2"></i> {{ $header ?? 'Tableau de bord' }}
                            </span>
                            <div class="d-flex">
                                <span class="navbar-text me-3">
                                    <i class="fas fa-calendar me-1"></i> {{ date('d/m/Y') }}
                                </span>
                            </div>
                        </div>
                    </nav>

                    <!-- Page Content -->
                    <main class="main-content">
                        <div class="container-fluid">
                            <!-- Messages d'alerte -->
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif
                            
                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <!-- Contenu de la page -->
                            <div class="card card-custom">
                                <div class="card-body">
                                    {{ $slot }}
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        
        <script>
            // Scripts communs
            document.addEventListener('DOMContentLoaded', function() {
                // Auto-dismiss alerts after 5 seconds
                setTimeout(function() {
                    const alerts = document.querySelectorAll('.alert');
                    alerts.forEach(alert => {
                        const bsAlert = new bootstrap.Alert(alert);
                        bsAlert.close();
                    });
                }, 5000);
            });
        </script>
    </body>
</html>