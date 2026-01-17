<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiblioTech | Showcase UX/UI</title>
    
    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* ===== VARIABLES & RESET ===== */
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #818cf8;
            --secondary: #f59e0b;
            --accent: #ec4899;
            --dark: #0f172a;
            --light: #f8fafc;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            
            --gradient-primary: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #d946ef 100%);
            --gradient-dark: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            --gradient-light: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            
            --shadow-soft: 0 20px 40px rgba(0, 0, 0, 0.08);
            --shadow-medium: 0 30px 60px rgba(0, 0, 0, 0.12);
            --shadow-hard: 0 40px 80px rgba(0, 0, 0, 0.16);
            
            --radius-sm: 12px;
            --radius-md: 20px;
            --radius-lg: 30px;
            --radius-xl: 40px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        html {
            scroll-behavior: smooth;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: var(--light);
            color: var(--dark);
            overflow-x: hidden;
            line-height: 1.7;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            line-height: 1.2;
        }
        
        /* ===== CUSTOM CURSOR ===== */
        .cursor {
            width: 40px;
            height: 40px;
            border: 2px solid var(--primary);
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 9999;
            mix-blend-mode: difference;
            transition: transform 0.3s ease;
        }
        
        .cursor-follower {
            width: 8px;
            height: 8px;
            background: var(--primary);
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 9998;
            transition: all 0.6s ease;
        }
        
        /* ===== GLASS MORPHISM ===== */
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: var(--shadow-soft);
        }
        
        .glass-dark {
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* ===== NEUMORPHISM ===== */
        .neu {
            background: var(--light);
            border-radius: var(--radius-md);
            box-shadow: 
                20px 20px 60px rgba(0, 0, 0, 0.08),
                -20px -20px 60px rgba(255, 255, 255, 0.8);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .neu:hover {
            transform: translateY(-10px);
            box-shadow: 
                30px 30px 60px rgba(0, 0, 0, 0.12),
                -30px -30px 60px rgba(255, 255, 255, 0.9);
        }
        
        /* ===== HERO SECTION ===== */
        .hero {
            min-height: 100vh;
            background: var(--gradient-primary);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            padding: 0 5%;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            width: 300%;
            height: 300%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: float 20s linear infinite;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .hero-title {
            font-size: 5.5rem;
            background: linear-gradient(45deg, #fff 30%, rgba(255,255,255,0.8) 70%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 2rem;
            line-height: 1.1;
        }
        
        .hero-subtitle {
            font-size: 1.5rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 3rem;
            max-width: 600px;
        }
        
        /* ===== ANIMATED BUTTONS ===== */
        .btn-magic {
            background: var(--gradient-primary);
            color: white;
            border: none;
            padding: 1.2rem 2.5rem;
            border-radius: var(--radius-lg);
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
            box-shadow: 0 10px 30px rgba(99, 102, 241, 0.3);
        }
        
        .btn-magic::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: 0.5s;
        }
        
        .btn-magic:hover::before {
            left: 100%;
        }
        
        .btn-magic:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 20px 40px rgba(99, 102, 241, 0.4);
        }
        
        /* ===== FLOATING ELEMENTS ===== */
        .floating {
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-2 {
            animation: float 8s ease-in-out infinite 1s;
        }
        
        .floating-3 {
            animation: float 7s ease-in-out infinite 2s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }
        
        /* ===== GRID SYSTEM ===== */
        .grid-magic {
            display: grid;
            gap: 2rem;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        }
        
        /* ===== CARD DESIGNS ===== */
        .card-3d {
            background: white;
            border-radius: var(--radius-lg);
            padding: 2.5rem;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        }
        
        .card-3d:hover {
            transform: translateY(-20px) rotateX(5deg) rotateY(5deg);
        }
        
        .card-3d::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: var(--gradient-primary);
            border-radius: var(--radius-lg);
            z-index: -1;
            filter: blur(20px);
            opacity: 0;
            transition: opacity 0.6s ease;
        }
        
        .card-3d:hover::before {
            opacity: 0.6;
        }
        
        /* ===== BOOK CARD SPECIAL ===== */
        .book-card-premium {
            background: white;
            border-radius: var(--radius-lg);
            overflow: hidden;
            position: relative;
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
            box-shadow: var(--shadow-soft);
        }
        
        .book-card-premium:hover {
            transform: perspective(1000px) rotateY(10deg) translateY(-15px);
            box-shadow: var(--shadow-hard);
        }
        
        .book-cover {
            height: 300px;
            background: var(--gradient-primary);
            position: relative;
            overflow: hidden;
        }
        
        .book-cover::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 40%, rgba(255,255,255,0.1) 50%, transparent 60%);
            animation: shine 3s infinite;
        }
        
        @keyframes shine {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
        
        /* ===== STATS WITH ANIMATION ===== */
        .stats-counter {
            font-size: 4rem;
            font-weight: 900;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* ===== HOVER EFFECTS ===== */
        .hover-glow {
            transition: all 0.3s ease;
        }
        
        .hover-glow:hover {
            filter: drop-shadow(0 0 20px rgba(99, 102, 241, 0.5));
        }
        
        /* ===== SECTIONS ===== */
        section {
            padding: 8rem 5%;
        }
        
        .section-title {
            font-size: 3.5rem;
            text-align: center;
            margin-bottom: 5rem;
            position: relative;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 5px;
            background: var(--gradient-primary);
            border-radius: 5px;
        }
        
        /* ===== NAVIGATION AVEC BOUTONS AUTH ===== */
        .nav-floating {
            position: fixed;
            top: 2rem;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: var(--radius-xl);
            padding: 1rem 2rem;
            z-index: 1000;
            box-shadow: var(--shadow-soft);
            border: 1px solid rgba(255, 255, 255, 0.3);
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 90%;
            max-width: 1400px;
        }
        
        .nav-links {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        
        .nav-auth {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        
        .nav-link {
            color: var(--dark);
            text-decoration: none;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            border-radius: var(--radius-lg);
            transition: all 0.3s ease;
            position: relative;
        }
        
        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 3px;
            background: var(--gradient-primary);
            border-radius: 3px;
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::before {
            width: 80%;
        }
        
        .nav-link:hover {
            color: var(--primary);
        }
        
        /* ===== BOUTONS AUTH ===== */
        .btn-auth {
            padding: 0.8rem 1.8rem;
            border-radius: var(--radius-lg);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-login {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }
        
        .btn-login:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.2);
        }
        
        .btn-register {
            background: var(--gradient-primary);
            color: white;
            box-shadow: 0 10px 30px rgba(99, 102, 241, 0.3);
        }
        
        .btn-register:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 40px rgba(99, 102, 241, 0.4);
        }
        
        /* ===== FOOTER ===== */
        .footer {
            background: var(--gradient-dark);
            color: white;
            padding: 6rem 5% 3rem;
            position: relative;
            overflow: hidden;
        }
        
        .footer::before {
            content: '';
            position: absolute;
            top: -100px;
            left: -100px;
            width: 300px;
            height: 300px;
            background: rgba(99, 102, 241, 0.1);
            border-radius: 50%;
        }
        
        /* ===== RESPONSIVE ===== */
        @media (max-width: 1024px) {
            .hero-title {
                font-size: 4rem;
            }
            
            .section-title {
                font-size: 2.8rem;
            }
        }
        
        @media (max-width: 768px) {
            .hero-title {
                font-size: 3.5rem;
            }
            
            .section-title {
                font-size: 2.5rem;
            }
            
            .stats-counter {
                font-size: 3rem;
            }
            
            .nav-floating {
                flex-direction: column;
                gap: 1rem;
                padding: 1rem;
                width: 95%;
            }
            
            .nav-links, .nav-auth {
                flex-wrap: wrap;
                justify-content: center;
            }
        }
        
        @media (max-width: 480px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            section {
                padding: 4rem 5%;
            }
            
            .nav-link, .btn-auth {
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }
        }
        
        /* ===== UTILITY CLASSES ===== */
        .text-gradient {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .bg-gradient {
            background: var(--gradient-primary);
        }
        
        .shadow-glow {
            box-shadow: 0 0 40px rgba(99, 102, 241, 0.2);
        }
        
        /* ===== STYLE POUR LES DONNÉES DYNAMIQUES ===== */
        .real-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            margin-top: 2rem;
        }
        
        .stat-item {
            text-align: center;
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: 900;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
        }
        
        .stat-label {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }
    </style>
</head>
<body>
    <!-- Custom Cursor -->
    <div class="cursor"></div>
    <div class="cursor-follower"></div>

    <!-- Floating Navigation avec boutons auth -->
    <nav class="nav-floating">
        <div class="nav-links">
            <a href="#hero" class="nav-link">Accueil</a>
            <a href="#design" class="nav-link">Design</a>
            <a href="#components" class="nav-link">Composants</a>
            <a href="#demo" class="nav-link">Démo</a>
            <a href="#contact" class="nav-link">Contact</a>
        </div>
        
        <div class="nav-auth">
            <!-- Vérifie si l'utilisateur est connecté -->
            @if(Auth::check())
                <!-- Si connecté : bouton tableau de bord -->
                <a href="{{ route('dashboard') }}" class="btn-auth btn-register">
                    <i class="fas fa-tachometer-alt me-2"></i>Tableau de bord
                </a>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-auth btn-login" style="cursor: pointer; border: none; font-family: inherit;">
                        <i class="fas fa-sign-out-alt me-2"></i>Déconnexion
                    </button>
                </form>
            @else
                <!-- Si non connecté : boutons connexion/inscription -->
                <a href="{{ route('login') }}" class="btn-auth btn-login">
                    <i class="fas fa-sign-in-alt me-2"></i>Connexion
                </a>
                <a href="{{ route('register') }}" class="btn-auth btn-register">
                    <i class="fas fa-user-plus me-2"></i>Inscription
                </a>
            @endif
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero" class="hero">
        <div class="hero-content">
            <h1 class="hero-title">
                <span class="text-gradient">BiblioTech</span><br>
                <span style="font-size: 3.5rem; display: block; margin-top: 1rem;">Redéfinir l'expérience numérique</span>
            </h1>
            <p class="hero-subtitle">
                Une bibliothèque numérique où chaque pixel raconte une histoire. 
                Design moderne, animations fluides et expérience utilisateur exceptionnelle.
            </p>
            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <!-- Utilisation des routes Laravel pour les boutons -->
                <a href="{{ route('register') }}" class="btn-magic" style="text-decoration: none;">
                    <i class="fas fa-rocket me-2"></i>Commencer l'aventure
                </a>
                <a href="{{ route('login') }}" class="btn-magic" style="background: var(--dark); text-decoration: none;">
                    <i class="fas fa-sign-in-alt me-2"></i>Se connecter
                </a>
            </div>
            
            <!-- Statistiques réelles en bas de la section hero -->
            @isset($stats)
            <div style="margin-top: 4rem; padding: 2rem; background: rgba(255,255,255,0.1); border-radius: var(--radius-lg); backdrop-filter: blur(10px);">
                <h3 style="color: white; text-align: center; margin-bottom: 1.5rem; font-size: 1.5rem;">Notre bibliothèque en chiffres</h3>
                <div class="real-stats">
                    <div class="stat-item">
                        <div class="stat-number" data-count="{{ $stats['totalLivres'] }}">0</div>
                        <div class="stat-label">Livres</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number" data-count="{{ $stats['livresDisponibles'] }}">0</div>
                        <div class="stat-label">Disponibles</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number" data-count="{{ $stats['totalCategories'] }}">0</div>
                        <div class="stat-label">Catégories</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number" data-count="{{ $stats['totalUsers'] }}">0</div>
                        <div class="stat-label">Membres</div>
                    </div>
                </div>
            </div>
            @endisset
        </div>
        
        <!-- Floating Elements -->
        <div class="floating" style="position: absolute; top: 20%; right: 10%; width: 100px; height: 100px; background: rgba(255,255,255,0.1); border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;"></div>
        <div class="floating-2" style="position: absolute; bottom: 20%; left: 10%; width: 150px; height: 150px; background: rgba(255,255,255,0.05); border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;"></div>
    </section>

    <!-- Design Showcase -->
    <section id="design" style="background: var(--light);">
        <div style="max-width: 1200px; margin: 0 auto;">
            <h2 class="section-title text-gradient">Design System Premium</h2>
            
            <div class="grid-magic">
                <!-- Card 1 -->
                <div class="card-3d">
                    <div style="font-size: 3rem; margin-bottom: 1rem; background: var(--gradient-primary); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h3 style="margin-bottom: 1rem; font-size: 1.8rem;">Palette Élégante</h3>
                    <p style="color: #64748b; margin-bottom: 2rem;">
                        Une palette de couleurs harmonieuse avec des gradients fluides et des tons modernes.
                    </p>
                    <div style="display: flex; gap: 0.5rem;">
                        <div style="width: 30px; height: 30px; background: var(--primary); border-radius: 50%;"></div>
                        <div style="width: 30px; height: 30px; background: var(--secondary); border-radius: 50%;"></div>
                        <div style="width: 30px; height: 30px; background: var(--accent); border-radius: 50%;"></div>
                        <div style="width: 30px; height: 30px; background: var(--dark); border-radius: 50%;"></div>
                    </div>
                </div>
                
                <!-- Card 2 -->
                <div class="card-3d">
                    <div style="font-size: 3rem; margin-bottom: 1rem; background: var(--gradient-primary); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                        <i class="fas fa-shapes"></i>
                    </div>
                    <h3 style="margin-bottom: 1rem; font-size: 1.8rem;">Animations Fluides</h3>
                    <p style="color: #64748b; margin-bottom: 2rem;">
                        Des animations subtiles qui améliorent l'expérience utilisateur sans surcharger.
                    </p>
                    <div class="floating" style="width: 50px; height: 50px; background: var(--gradient-primary); border-radius: 50%;"></div>
                </div>
                
                <!-- Card 3 -->
                <div class="card-3d">
                    <div style="font-size: 3rem; margin-bottom: 1rem; background: var(--gradient-primary); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 style="margin-bottom: 1rem; font-size: 1.8rem;">Responsive Design</h3>
                    <p style="color: #64748b; margin-bottom: 2rem;">
                        Adapté à tous les écrans, du mobile au desktop, avec une expérience optimisée.
                    </p>
                    <div style="display: flex; gap: 1rem;">
                        <i class="fas fa-mobile-alt" style="color: var(--primary);"></i>
                        <i class="fas fa-tablet-alt" style="color: var(--primary);"></i>
                        <i class="fas fa-laptop" style="color: var(--primary);"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Components Showcase -->
    <section id="components" style="background: var(--gradient-dark); color: white;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <h2 class="section-title" style="color: white;">Composants Avancés</h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 3rem; margin-top: 4rem;">
                <!-- Book Card Demo -->
                <div class="book-card-premium">
                    <div class="book-cover">
                        <div style="position: absolute; bottom: 2rem; left: 2rem; color: white;">
                            <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem;">Design Systems</h3>
                            <p>Par Axel Peboro YANDOBA</p>
                        </div>
                    </div>
                    <div style="padding: 2rem;">
                        <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 1.5rem;">
                            <div>
                                <span style="background: var(--primary); color: white; padding: 0.3rem 1rem; border-radius: 20px; font-size: 0.8rem; font-weight: 600;">UX/UI</span>
                            </div>
                            <div style="font-size: 2rem; color: var(--secondary);">
                                <i class="fas fa-star"></i>
                                <span style="font-size: 1rem; vertical-align: super;">4.9</span>
                            </div>
                        </div>
                        <p style="color: #64748b; margin-bottom: 1.5rem;">
                            Un guide complet pour créer des systèmes de design modernes et évolutifs.
                        </p>
                        <a href="{{ route('login') }}" class="btn-magic" style="width: 100%; display: block; text-decoration: none; text-align: center;">
                            <i class="fas fa-book-open me-2"></i>Lire le livre
                        </a>
                    </div>
                </div>
                
                <!-- Stats Demo -->
                <div class="glass" style="padding: 3rem; border-radius: var(--radius-lg);">
                    <h3 style="margin-bottom: 2rem; font-size: 1.8rem;">Statistiques en Temps Réel</h3>
                    
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 2rem;">
                        <div>
                            <div class="stats-counter" data-count="1247">0</div>
                            <p style="color: rgba(255,255,255,0.7);">Livres numériques</p>
                        </div>
                        <div>
                            <div class="stats-counter" data-count="568">0</div>
                            <p style="color: rgba(255,255,255,0.7);">Utilisateurs actifs</p>
                        </div>
                        <div>
                            <div class="stats-counter" data-count="892">0</div>
                            <p style="color: rgba(255,255,255,0.7);">Lectures ce mois</p>
                        </div>
                        <div>
                            <div class="stats-counter" data-count="4.9">0</div>
                            <p style="color: rgba(255,255,255,0.7);">Note moyenne</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Demo -->
    <section id="demo" style="background: var(--light);">
        <div style="max-width: 1200px; margin: 0 auto; text-align: center;">
            <h2 class="section-title text-gradient">Démo Interactive</h2>
            <p style="font-size: 1.2rem; color: #64748b; max-width: 600px; margin: 0 auto 4rem;">
                Testez nos composants en direct et découvrez la puissance de notre design system.
            </p>
            
            <div class="neu" style="padding: 4rem; border-radius: var(--radius-xl); max-width: 800px; margin: 0 auto;">
                <div style="font-size: 5rem; margin-bottom: 2rem; background: var(--gradient-primary); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                    <i class="fas fa-magic"></i>
                </div>
                <h3 style="font-size: 2rem; margin-bottom: 1.5rem;">Expérience Magique</h3>
                <p style="color: #64748b; margin-bottom: 3rem;">
                    Passez votre souris sur les éléments pour découvrir les animations et effets spéciaux.
                </p>
                
                <div style="display: flex; gap: 2rem; justify-content: center; flex-wrap: wrap;">
                    <a href="{{ route('register') }}" class="btn-magic hover-glow" style="text-decoration: none;">
                        <i class="fas fa-sparkles me-2"></i>Rejoindre maintenant
                    </a>
                    <button class="btn-magic" style="background: var(--dark);" id="rotate-btn">
                        <i class="fas fa-sync-alt me-2"></i>Rotation 3D
                    </button>
                    <button class="btn-magic" style="background: var(--accent);" id="pulse-btn">
                        <i class="fas fa-heartbeat me-2"></i>Effet Pulse
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer" id="contact">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 4rem; margin-bottom: 4rem;">
                <div>
                    <h3 style="font-size: 2rem; margin-bottom: 1.5rem; background: var(--gradient-primary); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                        BiblioTech
                    </h3>
                    <p style="color: rgba(255,255,255,0.7);">
                        Redéfinir l'expérience des bibliothèques numériques avec un design moderne et innovant.
                    </p>
                </div>
                
                <div>
                    <h4 style="margin-bottom: 1.5rem; color: white;">Technologies</h4>
                    <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                        <span class="glass" style="padding: 0.5rem 1rem; border-radius: var(--radius-sm); color: white;">Laravel</span>
                        <span class="glass" style="padding: 0.5rem 1rem; border-radius: var(--radius-sm); color: white;">Vue.js</span>
                        <span class="glass" style="padding: 0.5rem 1rem; border-radius: var(--radius-sm); color: white;">Tailwind</span>
                        <span class="glass" style="padding: 0.5rem 1rem; border-radius: var(--radius-sm); color: white;">MySQL</span>
                    </div>
                </div>
                
                <div>
                    <h4 style="margin-bottom: 1.5rem; color: white;">Liens rapides</h4>
                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        <a href="{{ route('login') }}" style="color: rgba(255,255,255,0.7); text-decoration: none; transition: color 0.3s ease;">
                            <i class="fas fa-sign-in-alt me-2"></i>Connexion
                        </a>
                        <a href="{{ route('register') }}" style="color: rgba(255,255,255,0.7); text-decoration: none; transition: color 0.3s ease;">
                            <i class="fas fa-user-plus me-2"></i>Inscription
                        </a>
                        <a href="#hero" style="color: rgba(255,255,255,0.7); text-decoration: none; transition: color 0.3s ease;">
                            <i class="fas fa-home me-2"></i>Accueil
                        </a>
                    </div>
                </div>
                
                <div>
                    <h4 style="margin-bottom: 1.5rem; color: white;">Contact</h4>
                    <p style="color: rgba(255,255,255,0.7); margin-bottom: 1rem;">
                        <i class="fas fa-user me-2"></i> Axel Peboro YANDOBA
                    </p>
                    <p style="color: rgba(255,255,255,0.7);">
                        <i class="fas fa-graduation-cap me-2"></i> Projet académique Laravel
                    </p>
                </div>
            </div>
            
            <div style="text-align: center; padding-top: 3rem; border-top: 1px solid rgba(255,255,255,0.1);">
                <p style="color: rgba(255,255,255,0.5);">
                    &copy; 2024 BiblioTech. Tous droits réservés. | Design & Développement avec ❤️
                </p>
                <div style="margin-top: 2rem; display: flex; gap: 2rem; justify-content: center; flex-wrap: wrap;">
                    @if(Auth::check())
                        <a href="{{ route('dashboard') }}" style="color: rgba(255,255,255,0.7); text-decoration: none;">Tableau de bord</a>
                    @else
                        <a href="{{ route('login') }}" style="color: rgba(255,255,255,0.7); text-decoration: none;">Connexion</a>
                        <a href="{{ route('register') }}" style="color: rgba(255,255,255,0.7); text-decoration: none;">Inscription</a>
                    @endif
                    <a href="#hero" style="color: rgba(255,255,255,0.7); text-decoration: none;">Accueil</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // ===== CUSTOM CURSOR =====
        const cursor = document.querySelector('.cursor');
        const cursorFollower = document.querySelector('.cursor-follower');
        
        document.addEventListener('mousemove', (e) => {
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';
            
            setTimeout(() => {
                cursorFollower.style.left = e.clientX + 'px';
                cursorFollower.style.top = e.clientY + 'px';
            }, 100);
        });
        
        // ===== ANIMATED COUNTERS =====
        function animateCounter(element) {
            const target = parseInt(element.getAttribute('data-count'));
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;
            
            const timer = setInterval(() => {
                current += step;
                if (current >= target) {
                    element.textContent = target.toFixed(target % 1 ? 1 : 0);
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current);
                }
            }, 16);
        }
        
        // ===== ANIMATE REAL STATS =====
        function animateRealStats() {
            document.querySelectorAll('.stat-number').forEach(element => {
                animateCounter(element);
            });
        }
        
        // ===== INTERACTIVE BUTTONS =====
        document.getElementById('rotate-btn').addEventListener('click', function() {
            this.style.transform = 'rotateY(180deg)';
            setTimeout(() => {
                this.style.transform = 'rotateY(0deg)';
            }, 600);
        });
        
        document.getElementById('pulse-btn').addEventListener('click', function() {
            this.style.animation = 'pulse 0.5s';
            setTimeout(() => {
                this.style.animation = '';
            }, 500);
        });
        
        // ===== SCROLL ANIMATIONS =====
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    if (entry.target.classList.contains('stats-counter')) {
                        animateCounter(entry.target);
                    }
                    if (entry.target.classList.contains('stat-number')) {
                        animateCounter(entry.target);
                    }
                    entry.target.style.opacity = 1;
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);
        
        // Observe elements
        document.querySelectorAll('.stats-counter, .stat-number').forEach(el => {
            el.style.opacity = 0;
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
        
        // ===== INITIALIZE ON LOAD =====
        window.addEventListener('load', () => {
            // Add pulse animation
            const style = document.createElement('style');
            style.textContent = `
                @keyframes pulse {
                    0% { transform: scale(1); }
                    50% { transform: scale(1.1); }
                    100% { transform: scale(1); }
                }
            `;
            document.head.appendChild(style);
            
            // Animer les statistiques réelles
            @isset($stats)
                animateRealStats();
            @endisset
        });
        
        // ===== SMOOTH SCROLL =====
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>