@extends('app_layout.templateUser')


@section('titre','Mes Programmes à venir')

@section('contenu')
<div class="pagetitle">
    <h1>Tous les porgrammes de ce contrat sont ici:</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Accueil</a></li>
            <!--li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">Blank</li-->
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">

        @if(count($programmes) == 0)
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Bonjour {{Auth::user()->name}}, Vous n'avez aucun contrat avec Waclo.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @else
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Vos programmes sont</h5>
                    <table class="table table-sm">
                        <thead>
                            <tr class="text-center" >
                                <th scope="col">#</th>
                                <th scope="col">Date Passage</th>
                                <th scope="col">Arrivée</th>
                                <th scope="col">Départ</th>
                                <th>Etat</th>
                                <th scope="col">Les agents</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($programmes as $key=> $item)
                            <tr class="text-center" >
                                <th scope="row">#</th>
                                <td>
                                    @php
                                    setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
                                    $formatted_date = strftime('%d %B %Y', strtotime($item->date_passage));
                                    echo $formatted_date;
                                    @endphp
                                </td>
                                <td>{{$item->heure_debut}}</td>
                                <td>{{$item->heure_fin}}</td>
                                <td>
                                    @if($item->effectuer == 0)
                                    <span class="badge rounded-pill bg-secondary">Pas encore exécuté</span>
                                    @else
                                    <span class="badge rounded-pill bg-success">Deja exécuté</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn btn-group">
                                        @if($item->date_passage != date('Y-m-d') and $item->effectuer == 0)
                                        <a class="btn btn-success" href="{{route('programmes.confirm',$item->id)}}">Confirmer passage des agents</a>
                                        @endif
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="{{'#basicModal'.$item->id}}">
                                            Voir agents
                                        </button>

                                    </div>
                                    @include('userView.seeProgramme')

                                </td>
                            </tr>



                            @endforeach

                        </tbody>
                    </table>
                    <!-- End small tables -->

                </div>
            </div>
        </div>
        @endif
    </div>
</section>

@endsection
