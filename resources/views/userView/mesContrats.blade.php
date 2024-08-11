@extends('app_layout.templateUser')


@section('titre','Mes contrats')

@section('contenu')
<div class="pagetitle">
    <h1>Mes contrats</h1>
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
        @if(count($contrats) == 0)
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
                    <h5 class="card-title">Vos contrats sont:</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center" >
                                <th scope="col">#</th>
                                <th scope="col">Début contrat</th>
                                <th scope="col">Fin contrat</th>
                                <th scope="col">Etat</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contrats as $key=> $item)
                            <tr  class="text-center">
                                <th scope="row">{{$key+1}}</th>

                                <td>
                                    @php
                                    setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
                                    $formatted_date = strftime(' %d %B %Y', strtotime($item->date_debut));
                                    echo $formatted_date;
                                    @endphp
                                </td>

                                <td>
                                    @php
                                    setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
                                    $formatted_date = strftime('%d %B %Y', strtotime($item->date_fin));
                                    echo $formatted_date;
                                    @endphp
                                </td>
                                <td>
                                    @if($item->boucler == 0)
                                    <span class="badge rounded-pill bg-warning text-dark">En cours</span>
                                    @else
                                    <span class="badge rounded-pill bg-danger text-dark">Deja bouclé</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn btn-group">
                                        <a href="{{route('prog_contrat',$item->id)}}" class="btn btn-primary">Programmes</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        @endif
    </div>
</section>

@endsection
