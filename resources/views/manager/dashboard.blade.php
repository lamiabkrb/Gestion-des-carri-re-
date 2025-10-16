@extends('manager.layouts.index')

@section('title', 'Dashboard Admin')
@section('page-title', 'Tableau de bord')

@section('content')



    <h3 class="fw-bold mb-4" style="color: #262D7B">Tableau de bord</h3>

    {{-- Statistiques rapides --}}
    <div class="row mb-4 g-3">
        <div class="col-md">
            <div class="card stat-card p-3 text-center h-100">
                <div class="icon-circle mb-2">
                    <i class="bi bi-people"></i>
                </div>
                <h4 class="fw-bold mb-1">10</h4>
                <p class="text-muted mb-0">Total Employés</p>
            </div>
        </div>
        <div class="col-md">
            <div class="card stat-card p-3 text-center h-100">
                <div class="icon-circle mb-2">
                    <i class="bi bi-pencil-square"></i>
                </div>
                <h4 class="fw-bold mb-1">3</h4>
                <p class="text-muted mb-0">Employés non évalués</p>
            </div>
        </div>
        <div class="col-md">
            <div class="card stat-card p-3 text-center h-100">
                <div class="icon-circle mb-2">
                    <i class="bi bi-check2-circle"></i>
                </div>
                <h4 class="fw-bold mb-1">7</h4>
                <p class="text-muted mb-0"> Évaluations terminées</p>
            </div>
        </div>
        <div class="col-md">
            <div class="card stat-card p-3 text-center h-100">
                <div class="icon-circle mb-2">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>
                <h4 class="fw-bold mb-1">5</h4>
                <p class="text-muted mb-0">Employés éligibles à l’avancement</p>
            </div>
        </div>
        <div class="col-md">
            <div class="card stat-card p-3 text-center h-100">
                <div class="icon-circle mb-2">
                    <i class="bi bi-bar-chart"></i>
                </div>
                <h4 class="fw-bold mb-1">-</h4>
                <p class="text-muted mb-0">Statistiques</p>
            </div>
        </div>
    </div>

    {{-- Campagnes en cours --}}
    <div class="card custom-card p-3 mb-4">
        <h5 class="fw-bold mb-3" style="color:#262D7B;">Campagnes en cours</h5>
        <div class="table-responsive">
            <table class="table align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>Nom</th>
                        <th>Type</th>
                        <th>Début</th>
                        <th>Statut</th>
                        <th>Employés éligibles</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($compagnes as $compagne)
                        <tr>
                            <td>{{ $compagne->titre_compagne }}</td>
                            <td><span
                                    class="badge  rounded-pill
                             {{ $compagne->type === 'Horizontale' ? 'bg-secondary' : 'bg-primary' }}">
                                    {{ $compagne->type }}
                                </span>
                            </td>
                            <td>{{ $compagne->date_debut }}</td>
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
                            </td>
                            <td class="text-center">
                                @if (in_array(strtolower($compagne->status), ['en cours', 'clôturée']))
                                    <div class="d-flex justify-content-center gap-2">
                                        <button class="btn btn-sm btn-light" onclick="window.location='{{ route('manager.employes_anoter', $compagne->id) }}'">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                @else
                                <div class="d-flex justify-content-center gap-2">
                                      --
                                    </div>
                                @endif



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
    </div>



    </div>


@endsection
