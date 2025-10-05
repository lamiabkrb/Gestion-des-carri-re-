@extends('admin.layouts.index')

@section('title', 'Paramètres')
@section('page-title', 'Paramètres')

@section('content')
    {{-- Main content --}}
    <div class="flex-grow-1 p-4">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold" style="color:#262D7B;">Paramètres</h3>
        </div>

        <!-- Paramètres Cards -->
        <div class="row g-4">

            <!-- Gestion utilisateurs et rôles -->
            <div class="col-md-6">
                <div class="card custom-card p-3">
                    <h5 class="card-title fw-bold mb-3" style="color:#2d3592;">
                        <i class="bi bi-person-gear me-2"></i> Gestion des utilisateurs et rôles
                    </h5>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-circle text-success me-2"></i> RH central</li>
                        <li><i class="bi bi-check-circle text-success me-2"></i> RH régional</li>
                        <li><i class="bi bi-check-circle text-success me-2"></i> Manager</li>
                        <li><i class="bi bi-check-circle text-success me-2"></i> Admin</li>
                    </ul>
                    <button class="btn btn-primary btn-sm mt-3">Configurer</button>
                </div>
            </div>

            <!-- Critères d’évaluation -->
            <div class="col-md-6">
                <div class="card custom-card p-3">
                    <h5 class="card-title fw-bold mb-2" style="color:#2d3592;">
                        <i class="bi bi-bar-chart-line me-2"></i> Critères d’évaluation
                    </h5>
                    <p class="text-muted">Définir pondérations et barèmes.</p>
                    <!-- Bouton d’ouverture -->
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#gestionBaremes">
                        <i class="bi bi-sliders me-2"></i> Gérer les barèmes
                    </button>
                </div>
            </div>

            <!---------------------------- Modal Critères & Barème-------------------- -->
            <!-- Modal -->
            <div class="modal fade" id="gestionBaremes" tabindex="-1" aria-labelledby="gestionBaremesLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl"> <!-- modal large (75% écran) -->
                    <div class="modal-content">

                        <!-- Header -->
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="gestionBaremesLabel" style="color:#2d3592;">
                                Gestion des barèmes d’évaluation
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>

                        <!-- Body -->
                        <div class="modal-body">

                            <!-- Tableau Compétences Techniques -->
                            <h6 class="fw-bold" style="color:#2d3592;">Compétences techniques</h6>
                            <table class="table table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Critère</th>
                                        <th>Pondération (max points)</th>
                                        <th>Débutant</th>
                                        <th>Opérationnel</th>
                                        <th>Expert</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="tableTechniques">
                                    <tr>
                                        <td>Maîtrise des procédures</td>
                                        <td>2.5</td>
                                        <td>1.5</td>
                                        <td>2</td>
                                        <td>2.5</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-success"><i
                                                    class="bi bi-pencil"></i></button>
                                            <button class="btn btn-sm btn-outline-danger"><i
                                                    class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Tableau Compétences Comportementales -->
                            <h6 class="fw-bold mt-4" style="color:#2d3592;">Compétences comportementales</h6>
                            <table class="table table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Critère</th>
                                        <th>Pondération (max points)</th>
                                        <th>Débutant</th>
                                        <th>Opérationnel</th>
                                        <th>Expert</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="tableComportementales">
                                    <tr>
                                        <td>Esprit d’équipe</td>
                                        <td>2.5</td>
                                        <td>1.5</td>
                                        <td>2</td>
                                        <td>2.5</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-success"><i
                                                    class="bi bi-pencil"></i></button>
                                            <button class="btn btn-sm btn-outline-danger"><i
                                                    class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Bouton ajouter critère -->
                            <button id="btnAddCritere" class="btn btn-outline-primary mt-2">
                                <i class="bi bi-plus-circle"></i> Ajouter un critère
                            </button>

                            <!-- Formulaire ajout critère (caché au début) -->
                            <div id="formAddCritere" class="card mt-3 p-3" style="display:none;">
                                <h6 style="color:#2d3592;">Nouveau critère</h6>
                                <div class="row g-2">
                                    <div class="col-md-3">
                                        <select id="typeCritere" class="form-select">
                                            <option value="Technique">Technique</option>
                                            <option value="Comportementale">Comportementale</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input id="nomCritere" type="text" class="form-control"
                                            placeholder="Nom du critère">
                                    </div>
                                    <div class="col-md-2">
                                        <input id="pondCritere" type="number" step="0.1" class="form-control"
                                            placeholder="Pondération">
                                    </div>
                                    <div class="col-md-1">
                                        <input id="debCritere" type="number" step="0.1" class="form-control"
                                            placeholder="Débutant">
                                    </div>
                                    <div class="col-md-1">
                                        <input id="opCritere" type="number" step="0.1" class="form-control"
                                            placeholder="Opér.">
                                    </div>
                                    <div class="col-md-1">
                                        <input id="expCritere" type="number" step="0.1" class="form-control"
                                            placeholder="Expert">
                                    </div>
                                    <div class="col-md-1 d-grid">
                                        <button id="saveCritere" class="btn btn-success"><i
                                                class="bi bi-check2"></i></button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                style="background-color:#f9cb15d2; border:none;" data-bs-dismiss="modal">
                                Fermer
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Script pour gestion -->
            <script>
                document.getElementById('btnAddCritere').addEventListener('click', function() {
                    document.getElementById('formAddCritere').style.display = 'block';
                });

                document.getElementById('saveCritere').addEventListener('click', function(e) {
                    e.preventDefault();

                    let type = document.getElementById('typeCritere').value;
                    let nom = document.getElementById('nomCritere').value;
                    let pond = document.getElementById('pondCritere').value;
                    let deb = document.getElementById('debCritere').value;
                    let op = document.getElementById('opCritere').value;
                    let exp = document.getElementById('expCritere').value;

                    let row = `
            <tr>
                <td>${nom}</td>
                <td>${pond}</td>
                <td>${deb}</td>
                <td>${op}</td>
                <td>${exp}</td>
                <td>
                    <button class="btn btn-sm btn-outline-success"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                </td>
            </tr>
        `;

                    if (type === "Technique") {
                        document.getElementById('tableTechniques').innerHTML += row;
                    } else {
                        document.getElementById('tableComportementales').innerHTML += row;
                    }

                    // reset form
                    document.getElementById('formAddCritere').style.display = 'none';
                    document.getElementById('nomCritere').value = '';
                    document.getElementById('pondCritere').value = '';
                    document.getElementById('debCritere').value = '';
                    document.getElementById('opCritere').value = '';
                    document.getElementById('expCritere').value = '';
                });
            </script>

            <!-- Script pour afficher le formulaire -->
            <script>
                document.getElementById('btnAddCritere').addEventListener('click', function() {
                    document.getElementById('formAddCritere').style.display = 'block';
                });
            </script>



            <!-- Sanctions -->
            <div class="col-md-6">
                <div class="card custom-card p-3">
                    <h5 class="card-title fw-bold mb-2" style="color:#2d3592;">
                        <i class="bi bi-exclamation-triangle me-2"></i> Sanctions et impacts
                    </h5>
                    <p class="text-muted">Configurer les sanctions et leurs effets sur l’avancement.</p>
                    <button class="btn btn-primary btn-sm">Configurer</button>
                </div>
            </div>

            <!-- Paramètres généraux -->
            <div class="col-md-6">
                <div class="card custom-card p-3">
                    <h5 class="card-title fw-bold mb-2" style="color:#2d3592;">
                        <i class="bi bi-gear me-2"></i> Paramètres généraux
                    </h5>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-circle text-success me-2"></i> Logo</li>
                        <li><i class="bi bi-check-circle text-success me-2"></i> Langues</li>
                        <li><i class="bi bi-check-circle text-success me-2"></i> Quotas</li>
                    </ul>
                    <button class="btn btn-primary btn-sm mt-2">Configurer</button>
                </div>
            </div>

        </div>

    </div>
    </div>

@endsection
