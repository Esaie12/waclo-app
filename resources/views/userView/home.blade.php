@extends('app_layout.templateUser')


@section('titre','Tableau de bord')

@section('contenu')
<div class="pagetitle">
    <h1></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Accueil</a></li>
            <!--li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">Blank</li-->
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">

        <div class="col-md-12">
            <h4>Bonjour <span  class="text-primary" > {{Auth::user()->name}}</span> , vous etes connecté sur l'espace client de Waclo.</h4>
        </div>

        @if(count($programmes) == 0)
        <div class="col-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>
                Vous n'avez aucun contrat en cours avec Waclo.
            </div>
        </div>

        @else
        <div class="col-lg-6">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Vos 5 prochains Programmes à venir sont:</h5>

                    <div class="accordion" id="accordionExample">


                        @foreach ($programmes as $key=> $item)


                        <div class="accordion-item">

                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="{{'#collapseTwo'.$key}}" aria-expanded="false" aria-controls="{{'collapseTwo'.$key}}">

                                    @php
                                    setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
                                    //echo  date('l d F Y', strtotime( $item->date_passage ) ) . '<br>';

                                    $formatted_date = strftime('%A %d %B %Y', strtotime($item->date_passage));
                                    echo $formatted_date;

                                    @endphp


                                    @if($item->date_passage == date('Y-m-d'))
                                    <strong class="text-primary" style="margin-right:5px" > Aujourd'hui </strong>
                                    @endif

                                    @if($item->effectuer == 0)
                                    <div class="badge rounded-pill bg-info" role="alert" style="margin-right:5px" >
                                        <strong>En attente</strong>
                                    </div>
                                    @else
                                    <div class="badge rounded-pill bg-success" role="alert" style="margin-right:5px" >
                                        <strong>Deja visité</strong>
                                    </div>
                                    @endif

                                </button>
                            </h2>
                            @php
                            if($key == 0){
                                $va = 'show';
                            }else{ $va = ""; }
                            @endphp

                            <div id="{{'collapseTwo'.$key}}" class="accordion-collapse collapse {{$va}}" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-6 text-primary">Heure d'arrivée</div>
                                        <div class="col-6">{{ $item->heure_debut }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-primary">Heure de départ</div>
                                        <div class="col-6">{{ $item->heure_fin }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-primary"></div>
                                        <div class="col-6"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-primary">L'équipe sera composée de </div>
                                        <div class="col-12" >
                                            <ol class="mt-2" >
                                                @php
                                                $bat = json_decode( $item->employes, true );
                                                @endphp
                                                @foreach ($bat as $item2)
                                                    <li>{{ $item2 }}</li>
                                                @endforeach
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>

                </div>
            </div>

        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Mon dernier contrat</h4>
                    @php
                        setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
                        $formatted_date1 = strftime(' %A %d %B %Y', strtotime($contrat->date_debut));
                        $formatted_date2 = strftime(' %A %d %B %Y', strtotime($contrat->date_fin));
                    @endphp

                    <p class="card-text">
                        Ce contrat entre vous et nous, débute le
                         <span class="text-primary">{{$formatted_date1}}</span> et
                        prend fin le  <span class="text-primary">{{$formatted_date2}}</span>
                    </p>
                </div>
            </div>
        </div>

        @endif


        <!--div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Text</p>
                </div>
            </div>
        </div-->

    </div>
</section>

@endsection
