@extends('admin.layouts.index')

@section('title', 'Campagnes')
@section('page-title', 'Campagnes')

@section('content')

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-primary-custom">Liste des employés éligibles dans cette campagne pour le mois de {{ $moisNom }}</h4>

    </div>

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
                    <th>Actions</th>
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
                            <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                                data-bs-target="#ficheEmploye{{ $employe->matricule }}">
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
