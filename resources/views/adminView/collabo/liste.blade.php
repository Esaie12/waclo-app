@extends('app_layout.template')


@section('titre','Liste des collaborateurs')

@section('contenu')
<div class="pagetitle">
    <h1>Liste des collaborateurs</h1>
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
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom & Prénoms</th>
                                <th scope="col">Email</th>
                                <th scope="col">Téléphone</th>
                                <th scope="col">Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                       <tbody>
                            @foreach ($collabo as $key=> $item)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$item->name." ".$item->firstname}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->telephone}}</td>
                                <td>
                                    @if($item->receve_mail == 1)
                                    <span class="badge rounded-pill bg-success">Reçoit des mails</span>
                                    @else
                                    <span  class="badge rounded-pill bg-danger" >Ne recoit pas des mails</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-info" href="{{route('admin.collabo.see',$item->id)}}">Actions</a>
                                </td>
                            </tr>
                            @endforeach
                       </tbody>
                    </table>

                </div>
            </div>

        </div>

    </div>
</section>

@endsection
