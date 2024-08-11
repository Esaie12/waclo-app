Home Admin <br>
<li class="nav-item">
    <a class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
        href="{{ route('admin.logout') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Deconnexion</span></a>
    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
        @csrf
    </form>
</li>
