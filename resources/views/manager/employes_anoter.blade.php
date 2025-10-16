@extends('manager.layouts.index')

@section('title', 'Campagnes')
@section('page-title', 'Campagnes')

@section('content')

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-primary-custom">Liste des employés à noter pour le mois de {{ $moisNom }}</h4>

    </div>
    @if (session('success_msg'))
        <div class="alert alert-success">
            {{ session('success_msg') }}
        </div>
    @endif


    {{-- 🔍 Filtres --}}
    <form method="GET" action="{{ route('manager.employes_anoter', $compagne->id) }}" class="mb-4">
        <div class="row g-3">

            {{-- Recherche par nom ou matricule --}}
            <div class="col-md-3">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                    placeholder="Rechercher (nom ou matricule)">
            </div>

            {{-- Filtrer par poste --}}
            <div class="col-md-3">
                <select name="poste" class="form-select">
                    <option value="">-- Tous les postes --</option>
                    @foreach ($employes->pluck('poste')->unique() as $poste)
                        <option value="{{ $poste }}" {{ request('poste') == $poste ? 'selected' : '' }}>
                            {{ ucfirst($poste) }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Filtrer par état de notation --}}
            <div class="col-md-3">
                <select name="etat" class="form-select">
                    <option value="">-- Tous les états --</option>
                    <option value="note" {{ request('etat') == 'note' ? 'selected' : '' }}>Déjà noté</option>
                    <option value="non_note" {{ request('etat') == 'non_note' ? 'selected' : '' }}>Non noté</option>
                </select>
            </div>

            {{-- Trier par --}}
            <div class="col-md-2">
                <select name="tri" class="form-select">
                    <option value="">-- Trier par --</option>
                    <option value="nom" {{ request('tri') == 'nom' ? 'selected' : '' }}>Nom</option>
                    <option value="note" {{ request('tri') == 'note' ? 'selected' : '' }}>Note</option>
                    <option value="recent" {{ request('tri') == 'recent' ? 'selected' : '' }}>Plus récent</option>
                </select>
            </div>

            {{-- Bouton --}}
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary w-100">Filtrer</button>
            </div>

        </div>
    </form>



    {{-- Tableau des employés --}}
    <div class="card custom-card p-3">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Poste</th>
                    <th>Département</th>
                    <th>Date recrutement</th>
                    <th>Échelon</th>
                    <th>Note</th>
                    <th>Notation</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($employes as $employe)
                    <tr>
                        <td class="matricule">{{ $employe->matricule }}</td>
                        <td>{{ $employe->nom }}</td>
                        <td>{{ $employe->prenom }}</td>
                        <td>{{ $employe->poste }}</td>
                        <td>{{ $employe->departement }}</td>
                        <td>{{ $employe->date_recrutement }}</td>
                        <td>
                            {{ $employe->echelon }}
                            <br><small class="text-muted">Dernière : {{ $employe->date_dernier_echelon }}</small>
                        </td>
                        <td>
                            @if ($employe->evaluations->isNotEmpty())
                                <span class="badge bg-success">{{ $employe->evaluations->first()->note }}/20</span>
                            @else
                                <span class="badge bg-secondary">Non noté</span>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-secondary"
                                onclick="window.location='{{ route('manager.shownotation', ['compagne_id' => $compagne->id, 'matricule' => $employe->matricule]) }}'">
                                <i class="bi bi-info-circle"></i>
                            </button>
                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>





    </div>
    {{-- Pagination automatique de Laravel --}}
    <div class="d-flex justify-content-end mt-3">
        {{ $employes->links() }}
    </div>

@endsection
