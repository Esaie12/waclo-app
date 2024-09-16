@extends('app_layout.template')


@section('titre','Devis demandes')

@section('contenu')
<div class="pagetitle">
    <h1>Les nouvelles demandes de devis</h1>
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
                                <th scope="col">Nom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Téléphone</th>
                                <th scope="col">Date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($devis as $key=> $item)
                            <tr>
                                <th scope="row">DEVI{{$item->id}}</th>
                                <td>{{$item->your_name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->telephone}}</td>
                                <td>{{$item->date_emission}}</td>
                                <td>
                                    <a href="{{route('admin.devis.details',$item->id)}}" class="btn btn-primary" >Détails</a>
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
