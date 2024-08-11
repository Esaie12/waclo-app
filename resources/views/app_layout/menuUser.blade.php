<li class="nav-item">
    <a class="nav-link {{request()->routeIs('admin.home') ? '' : 'collapsed'}} " href="{{route('home')}}">
        <i class="bi bi-grid"></i>
        <span>Accueil</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{request()->routeIs('programmes.mesprogrammes') ? '' : 'collapsed'}} " href="{{route('programmes.mesprogrammes')}}">
        <i class="bi bi-grid"></i>
        <span>Les Programmes</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{request()->routeIs('mescontrats') ? '' : 'collapsed'}} " href="{{route('mescontrats')}}">
        <i class="bi bi-grid"></i>
        <span>Mes Contrats</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{request()->routeIs('setting.index') ? '' : 'collapsed'}} " href="{{route('setting.index')}}">
        <i class="bi bi-grid"></i>
        <span>Paramètres</span>
    </a>
</li>


<li class="nav-item">
    <a class="nav-link collapsed"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="bi bi-envelope"></i>
        <span>Déconnexion</span>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form><form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>
</li>
