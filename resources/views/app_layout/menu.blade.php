<li class="nav-item">
    <a class="nav-link {{$dashboard ?? ''}} " href="{{route('admin.home')}}">
        <i class="bi bi-grid"></i>
        <span>Tableau de Bord</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link collapsed " data-bs-target="#devis-demande" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i>
        <span style="margin-right: 5px">Demandes de devis</span>
        @if($les_nbre['devis'] > 0)
        <span class="ml-3 badge rounded-pill bg-warning text-dark">{{$les_nbre['devis']}}</span>
        @endif
        <i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="devis-demande" class="nav-content collapse   {{$devi_menu ?? '' }}" data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{route('admin.devis.new')}}" class=" {{$devi_new ?? '' }}" >
                <i class="bi bi-circle"></i><span style="margin-right: 5px">Demandes en attente</span>
                @if($les_nbre['devis'] > 0)
                <span class="ml-3 badge rounded-pill bg-warning text-dark">{{$les_nbre['devis']}}</span>
                @endif
            </a>
        </li>
        <li>
            <a href="{{route('admin.devis.old')}}" class=" {{$devi_old ?? '' }}" >
                <i class="bi bi-circle"></i><span>Demandes deja traitées</span>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a class="nav-link  collapsed " data-bs-target="#job" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i>
        <span style="margin-right: 5px">Demandes de Job</span>
        @if($les_nbre['job'] > 0)
        <span class="ml-3 badge rounded-pill bg-warning text-dark">{{$les_nbre['job']}}</span>
        @endif
        <i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="job" class="nav-content collapse {{ $job_menu ?? '' }} " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{route('admin.jobs.new')}}" class="{{ $job_attente ?? '' }}" >
                <i class="bi bi-circle"></i><span>Demandes en attente</span>
            </a>
        </li>
        <li>
            <a href="{{route('admin.jobs.rdv')}}" class="{{ $job_rdv ?? '' }}" >
                <i class="bi bi-circle"></i><span>Les rendez-vous</span>
            </a>
        </li>
        <li>
            <a href="{{route('admin.jobs.old')}}" class="{{ $job_old ?? '' }}" >
                <i class="bi bi-circle"></i><span>Historique</span>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a class="nav-link  collapsed  " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Employés</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse {{$employes_menu ?? ''}}" data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{route('admin.employes.liste')}}" class=" {{$employes_list ?? ''}} ">
                <i class="bi bi-circle"></i><span>Liste des employés</span>
            </a>
        </li>
        <li>
            <a href="{{route('admin.employes.new')}}" class=" {{$employes_new ?? ''}} ">
                <i class="bi bi-circle"></i><span>Enregistrer</span>
            </a>
        </li>
    </ul>
</li>


<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Clients</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse {{$client_menu ?? ''}} " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{route('admin.clients.mesclients')}}" class="{{$client_liste ?? ''}} " >
                <i class="bi bi-circle"></i><span>Liste des clients</span>
            </a>
        </li>
        <li>
            <a href="{{route('admin.clients.new')}}" class="{{$client_new ?? ''}} " >
                <i class="bi bi-circle"></i><span>Enregistrer</span>
            </a>
        </li>
    </ul>
</li>


<li class="nav-item">
    <a class="nav-link collapsed " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>Travaux</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse {{$travaux_menu ?? ''}} " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{route('admin.travaux.new')}}" class="{{$travaux_new ?? ''}} " >
                <i class="bi bi-circle"></i><span>Enregistrer</span>
            </a>
        </li>
        <li>
            <a href="{{route('admin.travaux.encours')}}"  class="{{$travaux_cours ?? ''}} ">
                <i class="bi bi-circle"></i><span>Travaux en cours</span>
            </a>
        </li>
        <li>
            <a href="{{route('admin.travaux.historique')}} " class="{{$travaux_old ?? ''}} " >
                <i class="bi bi-circle"></i><span>Historique travaux</span>
            </a>
        </li>
    </ul>
</li>

<!--li class="nav-heading">Gestion</li-->
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#entrees" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>Administrateurs</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="entrees" class="nav-content collapse {{$admin_menu ?? '' }} " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{route('admin.collabo.liste')}}"  class="{{$admin_list ?? ''}}" >
                <i class="bi bi-circle"></i><span>La liste complète</span>
            </a>
        </li>
        <li>
            <a href="{{route('admin.collabo.new')}}" class="{{$admin_new ?? ''}}" >
                <i class="bi bi-circle"></i><span>Enregistrer un nouveau</span>
            </a>
        </li>


    </ul>
</li>
<!--li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#salaires" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>Les salaires</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="salaires" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="tables-general.html">
                <i class="bi bi-circle"></i><span>Travaux en cours</span>
            </a>
        </li>
        <li>
            <a href="tables-data.html">
                <i class="bi bi-circle"></i><span>Enregistrer</span>
            </a>
        </li>
        <li>
            <a href="tables-general.html">
                <i class="bi bi-circle"></i><span>Tous les travaux</span>
            </a>
        </li>
    </ul>
</li-->

<li class="nav-heading">Plus d'options</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="{{route('admin.setting.index')}}">
        <i class="bi bi-person"></i>
        <span>Mon Profil /  Paramètre</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="{{route('admin.setting.siteweb')}}">
        <i class="bi bi-person"></i>
        <span>Info Site Web</span>
    </a>
</li>



<li class="nav-item">
    <a class="nav-link collapsed"  href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="bi bi-envelope"></i>
        <span>Déconnexion</span>
    </a>
    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
        @csrf
    </form><form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
        @csrf
    </form>
</li>

