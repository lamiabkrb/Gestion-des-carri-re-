@extends('admin.layouts.index')

@section('title', 'Employés')
@section('page-title', 'Employés')
@section('content')
    {{-- Main content --}}
    <div class="flex-grow-1 p-4">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold text-primary-custom">Listes des employés</h4>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importEmployesModal">
                <i class="bi bi-plus-circle me-2"></i>Importer les employés (CSV)
            </button>

        </div>


        <!-- Modale d'import -->
        <div class="modal fade" id="importEmployesModal" tabindex="-1" aria-labelledby="importEmployesModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="importEmployesModalLabel">Importer les employés</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>

                    <form action="{{ route('employes.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="file" class="form-label">Sélectionnez un fichier CSV :</label>
                                <input type="file" name="file" id="file" class="form-control" accept=".csv"
                                    required>
                            </div>
                            <div class="alert alert-info">
                                Format attendu : <strong>matricule, nom, poste, département, date_recrutement,
                                    date_dernier_echelon, echelon</strong>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Importer</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        {{-- End Modale d'import --}}


        {{-- Barre de recherche et filtres --}}
        <div class="d-flex mb-3">
            <input type="text" class="form-control me-2" placeholder="Rechercher un employé...">
            <select class="form-select me-2" style="max-width:200px;">
                <option>Tous les départements</option>
                <option>RH</option>
                <option>IT</option>
                <option>Finance</option>
            </select>
            <select class="form-select" style="max-width:180px;">
                <option>Tous les statuts</option>
                <option>Actif</option>
                <option>Suspendu</option>
                <option>Retraité</option>
            </select>
        </div>

        {{-- Boutons Export --}}
        <div class="mb-3">
            <button class="btn btn-outline-success me-2"><i class="bi bi-file-earmark-excel me-1"></i> Exporter
                Excel</button>
            <button class="btn btn-outline-danger"><i class="bi bi-file-earmark-pdf me-1"></i> Exporter PDF</button>
        </div>

        @if (session('success_msg'))
            <div class="alert alert-success">{{ session('success_msg') }}</div>
        @endif

        @if (session('error_msg'))
            <div class="alert alert-danger">{{ session('error_msg') }}</div>
        @endif



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
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#ficheEmploye{{ $employe->matricule }}">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

            {{-- --------------------------- Modals - Fiches Employés --------------------------- --}}
            @foreach ($employes as $employe)
                <div class="modal fade" id="ficheEmploye{{ $employe->matricule }}" tabindex="-1"
                    aria-labelledby="ficheEmploye{{ $employe->matricule }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- En-tête -->
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="ficheEmploye{{ $employe->matricule }}"
                                    style="color:#2d3592;">
                                    Fiche Employé – {{ $employe->nom }} {{ $employe->prenom }}
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Fermer"></button>
                            </div>

                            <!-- Corps -->
                            <div class="modal-body">

                                <!-- Infos administratives -->
                                <h6 class="fw-bold" style="color:#2d3592;">Infos administratives</h6>
                                <ul class="list-unstyled mb-3">
                                    <li><strong>Matricule :</strong> {{ $employe->matricule }}</li>
                                    <li><strong>Nom & Prénom :</strong> {{ $employe->nom }} {{ $employe->prenom }}</li>
                                    <li><strong>Poste :</strong> {{ $employe->poste }}</li>
                                    <li><strong>Département :</strong> {{ $employe->departement }}</li>
                                    <li><strong>Date d’entrée :</strong> {{ $employe->date_recrutement }}</li>
                                </ul>

                                <!-- Historique des avancements -->
                                <h6 class="fw-bold" style="color:#2d3592;">Historique des avancements</h6>
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Département</th>
                                            <th>Date avancement</th>
                                            <th>Échelon</th>
                                            <th>Remarques</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $employe->departement }}</td>
                                            <td>{{ $employe->date_dernier_echelon }}</td>
                                            <td>{{ $employe->echelon }}</td>
                                            <td>--</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                            <!-- Pied -->
                            <div class="modal-footer d-flex justify-content-between align-items-center">
                                <!-- Lien texte pour téléchargement -->
                                <a href="#" class="text-decoration-none fw-bold" style="color:#262D7B;" download>
                                    <i class="bi bi-file-earmark-pdf me-1"></i> Télécharger la fiche employé (PDF)
                                </a>

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
            <!----------------------------- End Modal  ----------------------------->


            
            

        </div>
         {{-- Pagination automatique de Laravel --}}
            <div class="d-flex justify-content-end mt-3">
                {{ $employes->links() }}
            </div>

    </div>
@endsection
