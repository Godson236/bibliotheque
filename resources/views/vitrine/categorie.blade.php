<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $categorie->nom }} - BiblioTech</title>
    
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
        
        .category-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 4rem 0;
            margin-bottom: 3rem;
        }
        
        .category-icon {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    @include('partials.navbar')

    <!-- Category Header -->
    <div class="category-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="category-icon">
                        <i class="fas fa-tag"></i>
                    </div>
                    <h1 class="display-5 fw-bold mb-2">{{ $categorie->nom }}</h1>
                    <p class="lead mb-0 opacity-90">
                        {{ $livres->total() }} livre{{ $livres->total() > 1 ? 's' : '' }} dans cette catégorie
                    </p>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="{{ route('vitrine.catalogue') }}" class="btn btn-light">
                        <i class="fas fa-arrow-left me-2"></i>Retour au catalogue
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Category Description -->
    @if($categorie->description)
    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 bg-light">
                    <div class="card-body p-4">
                        <h3 class="h5 fw-bold mb-3">
                            <i class="fas fa-info-circle me-2"></i>À propos de cette catégorie
                        </h3>
                        <p class="mb-0">{{ $categorie->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Books Grid -->
    <div class="container mb-5">
        @if($livres->count() > 0)
            <div class="row g-4">
                @foreach($livres as $livre)
                <div class="col-md-4 col-lg-3">
                    @include('partials.book-card', ['livre' => $livre])
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5">
                {{ $livres->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-5">
                <i class="fas fa-book-open fa-4x text-muted mb-4" style="opacity: 0.5;"></i>
                <h3 class="mb-3">Aucun livre dans cette catégorie</h3>
                <p class="text-muted mb-4">
                    Aucun livre n'est actuellement disponible dans la catégorie "{{ $categorie->nom }}".
                </p>
                <a href="{{ route('vitrine.catalogue') }}" class="btn btn-primary">
                    <i class="fas fa-book-open me-2"></i>Explorer d'autres catégories
                </a>
            </div>
        @endif
    </div>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>