@extends('app_layout.templateAgent')


@section('titre','Acceuil Agent')

@section('contenu')
<div class="pagetitle">
    <h1>Espace Agent Waclo</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Accueil</a></li>
            <!--li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">Blank</li-->
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">

        <div class="col-md-12 mb-3">
            <h4>Bonjour <span  class="text-primary" > {{Auth::user()->name}}</span> , retrouvez ici vos missions de la journée. <br> Nous vous souhaitons une très bonne journée. </h4>
        </div>

        <div class="col-lg-6">
            @if(count($programmes) !=0)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Vos Programmes de la journée :</h5>

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

                                    <div class="row">
                                        <div class="col-6 text-primary">Client et Adresse</div>
                                        <div class="col-6">
                                            {{$item->adresse}} chez  {{$item->name}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>

                </div>
            </div>
            @else
            <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                Pour cette journée du
                <span class="text-primary">
                    @php
                    setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
                    $formatted_date = strftime('%A %d %B %Y', strtotime(date('Y-m-d')));
                    echo $formatted_date;
                    @endphp
                </span>
                Aucun programme n'a été trouvé pour vous.
            </div>

            @endif

        </div>


        <div class="col-lg-6">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Contrat de travail</h5>
                    <p>
                        Vous etes en contrat avec WACLO, depuis
                        <span class="text-primary">
                            @php
                            setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
                            $formatted_date = strftime('%A %d %B %Y', strtotime(Auth::user()->date_fonction));
                            echo $formatted_date;
                            @endphp
                        </span>. Et qui
                        prend fin le
                        <span class="text-primary">
                            @php
                            setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
                            $formatted_date = strftime('%A %d %B %Y', strtotime(Auth::user()->date_fin_contrat));
                            echo $formatted_date;
                            @endphp
                        </span>
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection
