@extends('layouts.index')

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
      <p class="text-muted mb-0">Évaluations en attente</p>
    </div>
  </div>
  <div class="col-md">
    <div class="card stat-card p-3 text-center h-100">
      <div class="icon-circle mb-2">
        <i class="bi bi-check2-circle"></i>
      </div>
      <h4 class="fw-bold mb-1">7</h4>
      <p class="text-muted mb-0">Évaluations terminées</p>
    </div>
  </div>
  <div class="col-md">
    <div class="card stat-card p-3 text-center h-100">
      <div class="icon-circle mb-2">
        <i class="bi bi-graph-up-arrow"></i>
      </div>
      <h4 class="fw-bold mb-1">5</h4>
      <p class="text-muted mb-0">Éligibles à l’avancement</p>
    </div>
  </div>
  <div class="col-md">
    <div class="card stat-card p-3 text-center h-100">
      <div class="icon-circle mb-2">
        <i class="bi bi-bar-chart"></i>
      </div>
      <h4 class="fw-bold mb-1">2</h4>
      <p class="text-muted mb-0" >Campagnes en cours</p>
    </div>
  </div>
</div>

    {{-- Campagnes en cours --}}
<div class="card custom-card p-3 mb-4">
  <h5 class="fw-bold mb-3" style="color:#262D7B;">Campagnes en cours</h5>
  <div class="table-responsive">
    <table class="table align-middle">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Type</th>
          <th>Début</th>
          <th>Statut</th>
          <th>Employés éligibles</th>

        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Campagne horizontale 2025</td>
          <td><span class="badge bg-warning text-dark">Horizontale</span></td>
          <td>01/09/2025</td>
          <td><span class="status-badge status-en-cours">En cours</span></td>
          <td>
            <a href="{{ url('campagnes/1/employes') }}" class="btn btn-sm btn-outline-primary">
              Voir employés
            </a>
          </td>

        </tr>

        <tr>
          <td>Campagne verticale 2026</td>
          <td><span class="badge bg-success text-light">Verticale</span></td>
          <td>15/01/2026</td>
          <td><span class="status-badge status-planifiee">Planifiée</span></td>
          <td>
            <a href="{{ url('campagnes/2/employes') }}" class="btn btn-sm btn-outline-primary">
              Voir employés
            </a>
          </td>

        </tr>
      </tbody>
    </table>
  </div>
</div>



  </div>


@endsection
