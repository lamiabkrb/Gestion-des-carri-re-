@extends('manager.layouts.index')

@section('title', 'Campagnes')
@section('page-title', 'Campagnes')

@section('content')

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-primary-custom">Campagnes</h4>
    </div>

    {{-- Barre de recherche & filtres --}}
    <div class="card custom-card p-3 mb-4">
        <form class="row g-3">
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Rechercher par mot-clé...">
            </div>
            <div class="col-md-2">
                <select class="form-select">
                    <option value="">Type</option>
                    <option>Horizontale</option>
                    <option>Verticale</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select">
                    <option value="">Statut</option>
                    <option>Planifiée</option>
                    <option>En cours</option>
                    <option>Clôturée</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select">
                    <option value="">Année</option>
                    <option>2025</option>
                    <option>2026</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-search me-1"></i> Filtrer
                </button>
            </div>
        </form>
    </div>

    {{-- Tableau principal --}}
    <div class="card custom-card p-3">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Nom / Titre</th>
                    <th>Type</th>
                    <th>Date début </th>
                    <th>Date fin</th>
                    <th>Statut</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($compagnes as $compagne)
                    <tr>
                        <td>{{ $compagne->titre_compagne }}</td>

                        <td>
                            <span
                                class="badge rounded-pill 
                            {{ $compagne->type === 'Horizontale' ? 'bg-secondary' : 'bg-primary' }}">
                                {{ $compagne->type }}
                            </span>
                        </td>

                        <td>{{ $compagne->date_debut }}</td>
                        <td>{{ $compagne->date_fin }}</td>

                        <td>
                            @php
                                $status = strtolower($compagne->status);
                                $badgeClass = match ($status) {
                                    'planifiée' => 'bg-warning text-dark',
                                    'en cours' => 'bg-success',
                                    'clôturée' => 'bg-danger',
                                    default => 'bg-light text-dark',
                                };
                            @endphp

                            <span class="badge {{ $badgeClass }}">{{ ucfirst($compagne->status) }}</span>
                            {{-- afficher licone users en cas le statut est en cours  --}}
                            @if (strtolower($compagne->status) === 'en cours')
                                <button class="btn btn-sm btn-light" onclick="window.location='{{ route('compagnes.employes', $compagne->id) }}'">
                                    <i class="bi bi-people"></i>
                                </button>
                            @endif

                        </td>

                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-sm btn-light" data-bs-toggle="modal"
                                    data-bs-target="#detailsCampaignModal">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Aucune campagne trouvée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>






    {{-- Pagination automatique de Laravel --}}
    <div class="d-flex justify-content-end mt-3">
        {{ $compagnes->links() }}
    </div>
@endsection
