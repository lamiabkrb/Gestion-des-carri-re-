<div class="sidebar p-3 d-flex flex-column vh-100" style="width: 240px;">
    <!-- Logo + Titre -->
    <div class="d-flex align-items-center mb-4">
        <img src="{{ asset('images/LogoAlgeriePoste.png') }}" alt="Logo" style="height: 40px;" class="me-2">
        <span class="fw-bold fs-5">TARQI@TIC</span>
    </div>

    <!-- Navigation principale -->
    <ul class="nav flex-column flex-grow-1">
        <li class="nav-item">
            <a href="{{ route('manager.dashboard') }}" class="nav-link {{ request()->routeIs('manager.dashboard') ? 'active fw-bold ' : '' }}"><i class="bi bi-house-door-fill me-2"></i> Tableau de bord</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('manager.showCompagne') }}" class="nav-link {{ request()->routeIs('compagnes.index') ? 'active fw-bold ' : '' }}"><i class="bi bi-megaphone-fill me-2"></i>Mes Campagnes</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('parametres.index') }}" class="nav-link {{ request()->routeIs('parametres.index') ? 'active fw-bold ' : '' }}"><i class="bi bi-gear-fill me-2"></i> Paramètres</a>
        </li>
    </ul>

    <!-- Déconnexion en bas -->
    <ul class="nav flex-column mt-auto">
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link btn btn-link"><i class="bi bi-box-arrow-left me-2"></i> Déconnexion</button>
            </form>
        </li>
    </ul>
</div>
