<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tableau de bord - Bibliothèque
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 bg-gradient-primary text-white" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 15px;">
                    <div class="d-flex align-items-center">
                        <div class="me-4">
                            <i class="fas fa-user-circle fa-3x"></i>
                        </div>
                        <div>
                            <h3 class="mb-1">Bonjour, {{ Auth::user()->name }} ! 👋</h3>
                            <p class="mb-0">Bienvenue dans votre espace bibliothèque numérique.</p>
                            <small><i class="fas fa-shield-alt me-1"></i> Rôle : {{ Auth::user()->role == 'admin' ? 'Administrateur' : 'Utilisateur' }}</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row mb-6">
                <div class="col-md-3 mb-4">
                    <div class="card card-custom border-start border-primary border-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="text-muted">Livres</h6>
                                    <h3 class="mb-0">0</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-book fa-2x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 mb-4">
                    <div class="card card-custom border-start border-success border-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="text-muted">Catégories</h6>
                                    <h3 class="mb-0">0</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-tags fa-2x text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 mb-4">
                    <div class="card card-custom border-start border-warning border-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="text-muted">Emprunts</h6>
                                    <h3 class="mb-0">0</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-exchange-alt fa-2x text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 mb-4">
                    <div class="card card-custom border-start border-info border-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="text-muted">Utilisateurs</h6>
                                    <h3 class="mb-0">1</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-users fa-2x text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            @if(Auth::user()->role == 'admin')
            <div class="card card-custom mb-6">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0"><i class="fas fa-bolt me-2"></i>Actions rapides (Admin)</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <a href="{{ url('/livres/create') }}" class="btn btn-primary w-100">
                                <i class="fas fa-plus me-2"></i>Ajouter un livre
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ url('/categories/create') }}" class="btn btn-success w-100">
                                <i class="fas fa-tag me-2"></i>Créer catégorie
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ url('/users') }}" class="btn btn-info w-100">
                                <i class="fas fa-user-cog me-2"></i>Gérer utilisateurs
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ url('/emprunts') }}" class="btn btn-warning w-100">
                                <i class="fas fa-clipboard-list me-2"></i>Voir emprunts
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Recent Activity -->
            <div class="card card-custom">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0"><i class="fas fa-history me-2"></i>Activité récente</h5>
                </div>
                <div class="card-body">
                    <div class="text-center py-5">
                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Aucune activité récente</h5>
                        <p class="text-muted">Commencez à utiliser la bibliothèque pour voir votre activité ici.</p>
                        @if(Auth::user()->role == 'admin')
                            <a href="{{ url('/livres/create') }}" class="btn btn-primary">
                                <i class="fas fa-book-medical me-2"></i>Ajouter votre premier livre
                            </a>
                        @else
                            <a href="{{ url('/catalogue') }}" class="btn btn-primary">
                                <i class="fas fa-search me-2"></i>Explorer le catalogue
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>