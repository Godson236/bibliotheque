<div class="card book-card h-100">
    @if($livre->image)
        <img src="{{ asset('storage/' . $livre->image) }}" 
             class="card-img-top" 
             alt="{{ $livre->titre }}"
             style="height: 200px; object-fit: cover;">
    @else
        <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
             style="height: 200px;">
            <i class="fas fa-book fa-4x text-muted"></i>
        </div>
    @endif
    
    <div class="card-body">
        <span class="badge bg-primary mb-2">
            {{ $livre->categorie->nom ?? 'Général' }}
        </span>
        
        <h5 class="card-title fw-bold">{{ Str::limit($livre->titre, 50) }}</h5>
        <p class="card-text text-muted small">
            <i class="fas fa-user-pen me-1"></i> {{ $livre->auteur }}
        </p>
        <p class="card-text small">{{ Str::limit($livre->description, 80) }}</p>
    </div>
    
    <div class="card-footer bg-white border-0">
        <div class="d-flex justify-content-between align-items-center">
            @if($livre->disponible)
                <span class="badge bg-success">
                    <i class="fas fa-check me-1"></i>Disponible
                </span>
            @else
                <span class="badge bg-secondary">
                    <i class="fas fa-times me-1"></i>Emprunté
                </span>
            @endif
            
            <a href="{{ route('vitrine.livre.show', $livre->id) }}" class="btn btn-sm btn-outline-primary">
                Détails
            </a>
        </div>
    </div>
</div>