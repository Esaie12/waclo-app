<div class="mobile-nav-toggler"><i class="fa fa-bars"></i></div>
<div class="menu-wrap">
    <nav class="menu-nav">
        <div class="logo">
            <a href="{{route('index')}}">
                <img style="width: 75px" src="{{asset('assets/img/logo-c.png')}}" alt="">
            </a>
        </div>
        <div class="navbar-wrap main-menu d-none d-lg-flex">
            <ul class="navigation">
                <li class="{{ request()->routeIs('index') ? 'active' : '' }}">
                    <a href="{{route('index')}}">Accueil</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">A propos de nous </a>
                    <ul class="submenu">
                        <li><a href="{{route('about')}}">Qui sommes-nous ?</a></li>
                        <li><a href="{{route('job')}}">Travaillez avec nous</a></li>
                    </ul>
                </li>
                <!--li class="{{ request()->routeIs('service') ? 'active' : '' }}"><a href="{{route('service')}}">Nos
                        services</a>
                </li javascript:void(0)-->
                <li class="{{ request()->routeIs('devis') ? 'active' : '' }} d-lg-none d-block"><a
                        href="{{route('devis')}}">Demande de devis</a>
                </li>
                <li class="menu-item-has-children children2">
                    <a href="{{route('service')}}">Nos services</a>
                    <ul class="submenu">
                        <li><a href="{{route('services.bureau')}}">Nettoyage de Bureau</a></li>
                        <li><a href="{{route('services.commerce')}}">Nettoyage de Commerce - Surface Commercial</a></li>
                        <li><a href="{{route('services.maison')}}">Nettoyage de Copropriété - Maison - Appartement</a></li>
                        <li><a href="{{route('services.ponctuel')}}">Nettoyage Ponctuel et Remise en état</a></li>
                        <li><a href="{{route('services.restaurant')}}">Nettoyage de Restaurant - Hotel</a></li>
                    </ul>
                </li>
                <style>
                    .children2 ul.submenu li a {
                        text-transform: none !important;
                    }


                </style>
                <li class="{{ request()->routeIs('contact') ? 'active' : '' }}"><a href="{{route('contact')}}">Nos
                        contacts</a>
                </li>
                <li class="menu-item-has-children d-lg-none d-block">
                    <a href="JavaScript:Void(0);">Mon compte</a>
                    <ul class="submenu">
                        @auth
                        <a  target="__blank" href="{{route('login')}}">Espace Client</a>
                        <a  target="__blank" href="{{route('loginagent')}}">Espace Agent</a>
                        @else
                        <li><a href="{{route('login')}}">Vous etes connecter</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div>
        <div class="header-action d-none d-md-block">
            <ul>
                <li class="header-btn">
                    <a href="{{route('devis')}}" class="btn upcase">
                        Demande de devis <i class="fa fa-arrow-right"></i>
                        <span></span>
                    </a>
                </li>
                <li class="text-right" >
                    <a href="#" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                        <img width="50px" src="{{asset('assets/img/connect.png')}}" alt="">
                    </a>
                    <div class="btn-group">
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                            <a  target="__blank"  class="dropdown-item" href="{{route('login')}}">Espace Client</a>
                            <div class="dropdown-divider"></div>
                            <a target="__blank" class="dropdown-item" href="{{route('loginagent')}}">Espace Agent</a>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </nav>
</div>

<div class="mobile-menu">
    <nav class="menu-box">
        <div class="close-btn"><i class="fa fa-times"></i></div>
        <div class="nav-logo">
            <a href="{{route('index')}}">
                <img style="width: 75px" src="{{asset('assets/img/logo-c.png')}}" alt="">
            </a>
        </div>
        <div class="menu-outer">
        </div>
        <div class="social-links">
            <ul class="clearfix">
                @if( !empty($siteweb->facebook) )
                <li><a href="{{$siteweb->facebook}}" target="__blank" ><span class="fa fa-twitter"></span></a></li>
                @endif
                @if(!empty($siteweb->twitter))
                <li><a href="{{$siteweb->twitter}}" target="__blank" ><span class="fa fa-facebook-square"></span></a></li>
                @endif

            </ul>
        </div>
    </nav>
</div>
<div class="menu-backdrop"></div>
