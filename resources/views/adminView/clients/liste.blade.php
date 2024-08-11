@extends('app_layout.template')


@section('titre','Mes clients')

@section('contenu')
<div class="pagetitle">
    <h1>Liste des clients</h1>
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
                    <th scope="col">Pseudo / Nom Société</th>
                    <th scope="col">Email</th>
                    <th scope="col">Téléphone</th>
                    <!--th scope="col">Inscrire par</th-->
                    <th scope="col">Date Inscription</th>
                    <th scope="col" >Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $key=> $item)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->telephone}}</td>
                        <td>{{$item->date_sign}}</td>
                        <td>
                            <a href="{{route('admin.clients.see',$item->id)}}" class="btn btn-primary">Actions</a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
</section>

@endsection
