@extends('app_layout.template')


@section('titre','Historique des travaux')

@section('contenu')
<div class="pagetitle">
    <h1>Historique des travaux</h1>
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
        <div class="col-md-12">
            @if(count($data) > 0)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Historique des travaux</h5>

                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Clients</th>
                                <th scope="col">Date de début</th>
                                <th scope="col">Date de fin</th>
                                <th scope="col">Modalité du contrat</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key=> $item)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$item->name}}</td>
                                <td>{{$item->date_debut}}</td>
                                <td>{{$item->date_fin}}</td>
                                <td>{{$item->frequence." par ".$item->modalite}}</td>
                                <td>
                                    <div class="btn-group">
                                        <!--a href="" class="btn btn-secondary" >Voir..</a-->
                                        <a href="{{route('admin.travaux.programmes',$item->id)}}" class="btn btn-secondary" >Programmes</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            @else
            <div class="alert alert-info" role="alert">
                <strong>L'historique de vos contrats est vide.</strong>
            </div>
            @endif
        </div>
    </div>
</section>

@endsection
