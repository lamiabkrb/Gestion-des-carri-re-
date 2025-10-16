@extends('manager.layouts.index')

@section('title', 'Notation')
@section('page-title', 'Notation')v

@section('content')

    <div class="card custom-card p-3">
        <h2 class="mb-4 text-primary-custom">Formulaire d’évaluation de performance</h2>

        <p class="text-muted">
            Veuillez évaluer le collaborateur sur les critères suivants selon le barème ci-dessous :
        </p>

        <div class="alert bg-accent text-primary-custom fw-bold">
            <i class="bi bi-info-circle"></i>
            <span>Notez chaque critère sur une échelle : <strong>Débutant</strong>, <strong>Opérationnel</strong>, ou
                <strong>Expert</strong>.</span>
        </div>


        @php
            $details = $evaluation
                ? $evaluation->notes_details ?? ['tech' => [], 'comp' => []]
                : ['tech' => [], 'comp' => []];
        @endphp



        <form action="{{ route('manager.notation', ['compagne_id' => $compagne->id, 'matricule' => $employe->matricule]) }}"
            method="POST">
            @csrf

            <!-- ==================== SECTION 1 ==================== -->
            <h4 class="text-primary-custom mb-3 mt-4">1. Compétences techniques (10 points)</h4>

            <table class="table table-bordered align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th>Critère</th>
                        <th>Débutant<br><small>1,5 pts</small></th>
                        <th>Opérationnel<br><small>2 pts</small></th>
                        <th>Expert<br><small>2,5 pts</small></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (['Maitrise des procédures', 'Maitrise des outils et technologies', 'Respect des délais', 'Qualité du travail'] as $critere)
                        <tr>
                            <td class="fw-semibold">{{ $critere }}</td>
                            @foreach ([1.5, 2, 2.5] as $valeur)
                                <td class="text-center">
                                    <input type="radio" name="tech[{{ $critere }}]" value="{{ $valeur }}"
                                        class="form-check-input"
                                        {{ isset($details['tech'][$critere]) && $details['tech'][$critere] == $valeur ? 'checked' : '' }}>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach

                </tbody>
            </table>

            <!-- ==================== SECTION 2 ==================== -->
            <h4 class="text-primary-custom mb-3 mt-5">2. Compétences comportementales (10 points)</h4>

            <table class="table table-bordered align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th>Critère</th>
                        <th>Débutant<br><small>1,5 pts</small></th>
                        <th>Opérationnel<br><small>2 pts</small></th>
                        <th>Expert<br><small>2,5 pts</small></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (["Esprit d'équipe", 'Sens de la communication', "Esprit d'initiative et anticipation", 'Réactivité et adaptabilité'] as $critere)
                        <tr>
                            <td class="fw-semibold">{{ $critere }}</td>
                            @foreach ([1.5, 2, 2.5] as $valeur)
                                <td class="text-center">
                                    <input type="radio" name="comp[{{ $critere }}]" value="{{ $valeur }}"
                                        class="form-check-input"
                                        {{ isset($details['comp'][$critere]) && $details['comp'][$critere] == $valeur ? 'checked' : '' }}>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach

                </tbody>
            </table>

            <!-- ==================== COMMENTAIRES ==================== -->
            <div class="mt-4">
                <label for="commentaire" class="form-label fw-semibold text-primary-custom">Commentaires /
                    Observations</label>
                <textarea name="commentaire" id="commentaire" class="form-control" rows="4"
                    placeholder="Saisissez vos remarques ici..."></textarea>
            </div>

            <!-- ==================== BOUTON ==================== -->
            <div class="text-end mt-4">
                <button type="submit" class="btn btn-primary px-4">
                    <i class="bi bi-check-circle"></i> Valider l’évaluation
                </button>
            </div>
        </form>


    </div>



@endsection
