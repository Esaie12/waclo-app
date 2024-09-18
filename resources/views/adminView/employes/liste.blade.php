<x-admin-layout>
    <x-slot name="titre">Liste des employés</x-slot>


    <x-slot name="employes_menu"> show</x-slot>
    <x-slot name="employes_list">active</x-slot>

    <div class="pagetitle">
        <h1>Liste des employés</h1>
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
                                    <th scope="col">Nom Prénoms</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Téléphone</th>
                                    <th scope="col">Sexe</th>
                                    <th scope="col">Créer le</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employes as $key=> $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->telephone}}</td>
                                        <td>{{$item->sexe}}</td>
                                        <td>{{$item->date_create}}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{route('admin.employes.see',$item->id)}}">Plus d'actions</a>
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
