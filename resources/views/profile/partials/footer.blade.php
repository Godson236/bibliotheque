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