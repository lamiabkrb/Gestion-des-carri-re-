@extends('admin.layouts.index')

@section('title', 'Employés')
@section('page-title', 'Employés')
@section('content')
    {{-- Main content --}}
    <div class="flex-grow-1 p-4">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold text-primary-custom">Listes des employés</h4>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCampaignModal">
                <i class="bi bi-plus-circle me-2"></i>Ajouter un employé
            </button>
        </div>

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

        {{-- Tableau des employés --}}
        <div class="card custom-card p-3">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Matricule</th>
                        <th>Nom & Prénom</th>
                        <th>Poste</th>
                        <th>Département</th>
                        <th>Catégorie</th>
                        <th>Échelon</th>
                        <th>Date d’entrée</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="matricule">123456789</td>
                        <td>Ali Ben Ahmed</td>
                        <td>Développeur</td>
                        <td>IT</td>
                        <td>
                            12
                            <br><small class="text-muted">Dernière : 15/06/2023</small>
                        </td>
                        <td>
                            5
                            <br><small class="text-muted">Dernier : 01/07/2022</small>
                        </td>
                        <td>01/03/2022</td>
                        <td><span class="status-badge status-en-cours">Actif</span></td>

                        <td>
                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#ficheEmploye1">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-success"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td class="matricule">987654321</td>
                        <td>Fatima Zahra</td>
                        <td>Responsable RH</td>
                        <td>Ressources Humaines</td>
                        <td>
                            10
                            <br><small class="text-muted">Dernière : 01/01/2022</small>
                        </td>
                        <td>
                            4
                            <br><small class="text-muted">Dernier : 15/02/2021</small>
                        </td>
                        <td>15/09/2020</td>
                        <td><span class="status-badge status-cloturee">Suspendu</span></td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#ficheEmploye2">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-success"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                </tbody>

            </table>

            {{-- Modals - Fiches Employés --}}
            <!-- Modal Fiche Employé Ali Ben Ahmed -->
            <div class="modal fade" id="ficheEmploye1" tabindex="-1" aria-labelledby="ficheEmployeLabel1"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <!-- En-tête -->
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="ficheEmployeLabel1" style="color:#2d3592;">
                                Fiche Employé – Ali Ben Ahmed
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>

                        <!-- Corps -->
                        <div class="modal-body">

                            <!-- Infos administratives -->
                            <h6 class="fw-bold" style="color:#2d3592;">Infos administratives</h6>
                            <ul class="list-unstyled mb-3">
                                <li><strong>Matricule :</strong> 123456789</li>
                                <li><strong>Nom & Prénom :</strong> Ali Ben Ahmed</li>
                                <li><strong>Poste :</strong> Développeur</li>
                                <li><strong>Département :</strong> IT</li>
                                <li><strong>Date d’entrée :</strong> 01/03/2022</li>
                                <li><strong>Statut :</strong> <span class="badge bg-success">Actif</span></li>
                            </ul>

                            <!-- Historique des avancements -->
                            <h6 class="fw-bold" style="color:#2d3592;">Historique des avancements</h6>
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Catégorie</th>
                                        <th>Date avancement</th>
                                        <th>Échelon</th>
                                        <th>Date échelon</th>
                                        <th>Remarques</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>12</td>
                                        <td>15/09/2020</td>
                                        <td>3</td>
                                        <td>15/02/2021</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>01/04/2022</td>
                                        <td>4</td>
                                        <td>20/05/2023</td>
                                        <td>Bonne performance</td>
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
            <!-- End Modal Ali Ben Ahmed -->

            <!-- Modal Fiche Employé -->
            <div class="modal fade" id="ficheEmploye2" tabindex="-1" aria-labelledby="ficheEmployeLabel2"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <!-- En-tête -->
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="ficheEmployeLabel2" style="color:#2d3592;">Fiche
                                Employé – Fatima Zahra
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>

                        <!-- Corps -->
                        <div class="modal-body">

                            <!-- Infos administratives -->
                            <h6 class="fw-bold" style="color:#2d3592;">Infos administratives</h6>
                            <ul class="list-unstyled mb-3">
                                <li><strong>Matricule :</strong> 123456789</li>
                                <li><strong>Nom & Prénom :</strong> Fatima Zahra</li>
                                <li><strong>Poste :</strong> Responsable RH</li>
                                <li><strong>Département :</strong> RH</li>
                                <li><strong>Date d’entrée :</strong> 15/09/2020</li>
                                <li><strong>Statut :</strong> <span class="badge bg-success">Actif</span></li>
                            </ul>

                            <!-- Historique des avancements -->
                            <h6 class="fw-bold" style="color:#2d3592;">Historique des avancements</h6>
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Catégorie</th>
                                        <th>Date avancement</th>
                                        <th>Échelon</th>
                                        <th>Date échelon</th>
                                        <th>Remarques</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>12</td>
                                        <td>15/09/2020</td>
                                        <td>3</td>
                                        <td>15/02/2021</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>01/04/2022</td>
                                        <td>4</td>
                                        <td>20/05/2023</td>
                                        <td>Bonne performance</td>
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
            {{-- End Modals --}}

            {{-- Pagination --}}
            <nav>
                <ul class="pagination justify-content-end">
                    <li class="page-item disabled"><a class="page-link" href="#">Précédent</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
                </ul>
            </nav>

        </div>

    </div>
@endsection
