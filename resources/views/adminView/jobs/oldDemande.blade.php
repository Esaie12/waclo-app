
<x-admin-layout>
    <x-slot name="titre">Jobs demandes</x-slot>

    <x-slot name="job_menu">show</x-slot>
    <x-slot name="job_old">active</x-slot>

    <div class="pagetitle">
        <h1>Historique des demandes de travail</h1>
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
                                    <th scope="col">Traite le</th>
                                    <th scope="col">Traite par</th>
                                    <th scope="col">Statut</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $key=> $item)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$item->your_name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->telephone}}</td>
                                    <td>{{$item->date_traitement}}</td>
                                    <td>{{$item->firstname}}</td>
                                    <td>
                                        @if($item->reject_dossier == 0)
                                        <span class="badge bg-success">Accepter</span>
                                        @else
                                        <span class="badge bg-danger"> Rejecter</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.jobs.details',$item->id)}}" class="btn btn-primary" >Détails</a>
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

</x-admin-layout>

