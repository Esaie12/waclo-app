@extends('app_layout.templateAgent')


@section('titre','Mon Agenda')

@section('contenu')
<div class="pagetitle">
    <h1>Mon Agenda</h1>
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
        @php
        if($result == 1){
            $date_max = $date_max;
            $date_min= $date_min;
            $type = $type;
        }else{
            $date_max = "";
            $date_min= date('Y-m-d');
            $type = 2;
        }
        @endphp

        <div class="col-12 mb-4">
            <form class="row" action="{{route('agent.search')}}" method="get">

                <div class="col-md-3">
                    <div class="form-group ">
                      <label for="">A partir de </label>
                      <input type="date" name="date_min" value="{{$date_min}}"  id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group ">
                        <label for="">A </label>
                        <input type="date" name="date_max" value="{{$date_max }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group ">
                        <label for="">Selectionner</label>
                        <select name="type" id="" class="form-control">
                            <option @if($type == 2) selected @endif value="2">Tout</option>
                            <option @if($type == 1) selected @endif value="1">Deja passé</option>
                            <option @if($type == 0) selected @endif value="0">Non passé</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for=""></label>
                    <button class="btn btn-primary mt-4" >Rechercher</button>
                </div>
            </form>
        </div>

        @if(count($programmes) == 0)
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Bonjour {{Auth::user()->name}}, Vous n'avez aucun programme de nettoyage correspondant à cette date.
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
                                <th>Adresse</th>
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
                                <td>{{$item->adresse}}</td>
                                <td>
                                    @if($item->effectuer == 0)
                                    <span class="badge rounded-pill bg-secondary">Pas encore exécuté</span>
                                    @else
                                    <span class="badge rounded-pill bg-success">Deja exécuté</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="{{'#basicModal'.$item->id}}">
                                        Voir agents
                                    </button>
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
