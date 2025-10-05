@extends('admin.layouts.index')

@section('title', 'Campagnes')
@section('page-title', 'Campagnes')

@section('content')

{{-- Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-primary-custom">Campagnes</h4>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCampaignModal">
        <i class="bi bi-plus-circle me-2"></i>Lancer une campagne
    </button>
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
    <table class="table align-middle">
        <thead class="table-light">
            <tr>
                <th>Nom / Titre</th>
                <th>Type</th>
                <th>Date début</th>
                <th>Date fin</th>
                <th>Statut</th>
                <th>Employés éligibles</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            {{-- Exemple 1 --}}
            <tr>
                <td>Campagne horizontale 2025</td>
                <td><span class="badge bg-success">Horizontale</span></td>
                <td>01/08/2025</td>
                <td>30/09/2025</td>
                <td><span class="status-badge status-en-cours">En cours</span></td>
                <td>
                    <a href="{{ url('campagnes/1/employes') }}" class="btn btn-sm btn-outline-primary">
                        85 employés
                    </a>
                </td>
                <td>
                    <button class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#detailsCampaignModal">
                        <i class="bi bi-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-light">
                        <i class="bi bi-pencil"></i>
                    </button>
                    <button class="btn btn-sm btn-light">
                        <i class="bi bi-archive"></i>
                    </button>
                    <button class="btn btn-sm btn-light">
                        <i class="bi bi-file-earmark-arrow-down"></i>
                    </button>
                </td>
            </tr>

            {{-- Exemple 2 --}}
            <tr>
                <td>Campagne verticale 2026</td>
                <td><span class="badge bg-warning text-dark">Verticale</span></td>
                <td>15/01/2026</td>
                <td>15/03/2026</td>
                <td><span class="status-badge status-planifiee">Planifiée</span></td>
                <td>
                    <a href="{{ url('campagnes/2/employes') }}" class="btn btn-sm btn-outline-primary">
                        120 employés
                    </a>
                </td>
                <td>
                    <button class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#detailsCampaignModal">
                        <i class="bi bi-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-light">
                        <i class="bi bi-pencil"></i>
                    </button>
                    <button class="btn btn-sm btn-light">
                        <i class="bi bi-archive"></i>
                    </button>
                    <button class="btn btn-sm btn-light">
                        <i class="bi bi-file-earmark-arrow-down"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>


{{-- Modal Création Campagne --}}
<div class="modal fade" id="createCampaignModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title text-primary-custom">Lancer une campagne</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Titre</label>
                        <input type="text" class="form-control" placeholder="Nom de la campagne">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <select class="form-select">
                            <option>Horizontale</option>
                            <option>Verticale</option>
                        </select>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Date début</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col">
                            <label class="form-label">Date fin</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="1"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" data-bs-dismiss="modal">Annuler</button>
                    <button class="btn btn-primary">Créer</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- Modal Détails Campagne --}}
<div class="modal fade" id="detailsCampaignModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title text-primary-custom">Détails de la campagne</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <h6 class="fw-bold">Informations générales</h6>
                <p><b>Titre :</b> Campagne horizontale Q3 2025</p>
                <p><b>Type :</b> Horizontale</p>
                <p><b>Dates :</b> 01/08/2025 → 30/09/2025</p>
                <p><b>Statut :</b> En cours</p>

                <!-- Timeline Avancement -->
<div class="timeline-container text-center mt-4">
  <div class="d-flex justify-content-between position-relative">
    <!-- Ligne de fond -->
    <div class="timeline-line bg-light"></div>
    <!-- Ligne de progression -->
    <div class="timeline-progress"></div>

    <!-- Étape 1 -->
    <div class="timeline-step completed">
      <div class="circle"></div>
      <span class="label">Notation</span>
    </div>


    <!-- Étape 2 -->
    <div class="timeline-step active">
      <div class="circle"></div>
      <span class="label">PV</span>
    </div>

    <!-- Étape 3 -->
    <div class="timeline-step">
      <div class="circle"></div>
      <span class="label">Validation</span>
    </div>
  </div>
          <!-- Export XLS -->
        <div class="text-center mt-4">
          <a href=""
             class="btn fw-bold"
             style="background-color:#262D7B; color:#fff;">
            <i class="bi bi-file-earmark-excel-fill me-2"></i> Télécharger la liste des avancements (XLS)
          </a>
        </div>
</div>

@endsection
