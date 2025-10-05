@extends('admin.layouts.index')

@section('title', 'Dashboard Admin')
@section('page-title', 'Tableau de bord')

@section('content')

    <h3 class="text-primary-custom"> <b> Tableau de bord</b></h3>
    {{-- Statistiques rapides --}}
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card stat-card p-3">

                <i class="bi bi-people"></i><p class="text-muted mb-1">Employés éligibles</p>
                <h2 class="fw-bold text-primary-custom">120</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card p-3">
                <i class="bi bi-bar-chart"></i><p class="text-muted mb-1">Campagnes en cours</p>
                <h2 class="fw-bold text-accent">4</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card p-3">
                <i class="bi bi-check2-circle"></i><p class="text-muted mb-1">Avancements validés</p>
                <h2 class="fw-bold text-success-custom">85</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card p-3">
                <i class="bi bi-pencil-square"></i><p class="text-muted mb-1">PV en attente</p>
                <h2 class="fw-bold text-error">2</h2>
            </div>
        </div>
    </div>

    <div class="row">
        {{-- Tableau des campagnes --}}
        <div class="col-md-8 mb-4">
            <div class="card custom-card p-3">
                <h5 class="fw-bold mb-3 text-primary-custom">Campagnes</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Date début</th>
                            <th>Date fin</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Horizontale</td>
                            <td>01/08/2025</td>
                            <td>30/09/2025</td>
                            <td><span class="status-badge status-en-cours">En cours</span></td>
                        </tr>
                        <tr>
                            <td>Verticale</td>
                            <td>15/08/2025</td>
                            <td>15/10/2025</td>
                            <td><span class="status-badge status-cloturee">Clôturée</span></td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-primary mt-2">Lancer une nouvelle campagne</button>
            </div>
        </div>

        {{-- Notifications --}}
        <div class="col-md-4 mb-4">
            <div class="card custom-card p-3 shadow-sm">
                <h5 class="fw-bold mb-3 text-primary-custom">Notifications</h5>
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <i class="bi bi-bell-fill me-2 text-accent"></i>
                        Balayage effectué le <b class="text-primary-custom">01/08/2026</b> ;
                        10 employés éligibles à un avancement vertical
                    </li>
                    <li class="mb-3">
                        <i class="bi bi-megaphone-fill me-2 text-accent"></i>
                        La campagne horizontale du <b class="text-primary-custom">15/08/2025</b> est clôturée, PV attendu
                    </li>
                </ul>
                <a href="#" class="fw-bold link-custom">Voir plus</a>
            </div>
        </div>
    </div>
@endsection
