<li class="nav-item">
    <a class="nav-link {{request()->routeIs('agent.home') ? '' : 'collapsed'}} " href="{{route('agent.home')}}">
        <i class="bi bi-grid"></i>
        <span>Accueil</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{request()->routeIs('agent.agenda') ? '' : 'collapsed'}} " href="{{route('agent.agenda')}}">
        <i class="bi bi-grid"></i>
        <span>Mon Agenda</span>
    </a>
</li>
<!--li class="nav-item">
    <a class="nav-link {{request()->routeIs('mescontrats') ? '' : 'collapsed'}} " href="{{route('mescontrats')}}">
        <i class="bi bi-grid"></i>
        <span>Mes messages</span>
    </a>
</li-->

<li class="nav-item">
    <a class="nav-link {{request()->routeIs('agent.setting.index') ? '' : 'collapsed'}} " href="{{route('agent.setting.index')}}">
        <i class="bi bi-grid"></i>
        <span>Mon Profil / Paramètres</span>
    </a>
</li>


<li class="nav-item">
    <a class="nav-link collapsed"  href="{{ route('agent.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="bi bi-envelope"></i>
        <span>Déconnexion</span>
    </a>
    <form id="logout-form" action="{{ route('agent.logout') }}" method="POST">
        @csrf
    </form><form id="logout-form" action="{{ route('agent.logout') }}" method="POST">
        @csrf
    </form>
</li>
