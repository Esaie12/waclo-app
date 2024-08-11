@extends('app_layout.template')


@section('titre','Voir un collaborateur')

@section('contenu')
<div class="pagetitle">
    <h1>Modifier le collaborateur {{$data->name}} </h1>
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
        <div class="col-12 mb-2 " style="text-align: right" >
            <a class="btn btn-outline-danger" onclick="return confirm('Vous voulez vous vraiment supprimer cet administrateur ?')" href="{{route('admin.collabo.delete_collabo',$data->id)}}">Supprimer cet admin</a>
        </div>
        <div class="col-xl-4">

            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    @if($data->photo == null)
                    <img style="width: 150px" src="{{asset('assets/img/default-profil.png')}}" alt="Profile"
                        class="rounded-circle">
                    @else
                    <img style="width: 150px" src="{{asset(env('start').$data->photo)}}" alt="Profile"
                        class="rounded-circle">
                    @endif
                    <h2>{{$data->name}}</h2>

                </div>
            </div>

        </div>
        <div class="col-xl-8">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">

                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview"
                                aria-selected="true" role="tab">Informations</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit"
                                aria-selected="false" tabindex="-1" role="tab">Modifier Profil</button>
                        </li>


                    </ul>
                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active profile-overview" id="profile-overview" role="tabpanel">

                            <h5 class="card-title">Details Profil</h5>

                            <x-admin.details-devis question="Nom & Prénoms" reponse="{{$data->name}}" />
                            <x-admin.details-devis question="Téléphone" reponse="{{$data->telephone}}" />
                            <x-admin.details-devis question="Email" reponse="{{$data->email}}" />
                            <x-admin.details-devis question="Addresse" reponse="{{$data->adresse}}" />
                                <div class="row">
                                    <div class="col-6 text-primary">
                                        Recevoir mail
                                    </div>
                                    <div class="col-6">
                                        @if($data->receve_mail == 1)
                                        <span class="text-success">Recoit des mails</span>
                                        @else
                                        <span class="text-danger">Ne reçoit pas de mails</span>
                                        @endif
                                    </div>
                                </div>
                        </div>

                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit" role="tabpanel">

                            <!-- Profile Edit Form -->
                            <form action="{{route('admin.collabo.setting')}}"  method="post">
                                @csrf
                                <input type="hidden" name="idLigne" value="{{$data->id}}" >
                                <div class="row mb-3">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nom & Prénoms</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="text" class="form-control" id="inputName5" name="name"
                                            value="{{@old('name',$data->name)}}">
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Téléphone</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="text" name="telephone" value="{{@old('telephone',$data->telephone)}}" class="form-control" id="inputName5">
                                        @error('telephone')
                                            <strong class="text-danger" >{{$message}}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Adresse</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="text"  name="adresse" value="{{@old('adresse',$data->adresse)}}" class="form-control" id="inputName5">
                                        @error('adresse')
                                            <strong class="text-danger" >{{$message}}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Recevoir des mails</label>
                                    <div class="col-md-8 col-lg-9">
                                        <select name="receve_mail" id="" class="form-control">
                                            <option value="">Faites un choix</option>
                                            <option value="1" @if(old('receve_mail',$data->receve_mail) == 1) selected @endif >Oui</option>
                                            <option value="0" @if(old('receve_mail',$data->receve_mail) == 0) selected @endif >Non</option>
                                        </select>
                                        @error('receve_mail')
                                            <strong class="text-danger" >Faites un choix</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Sauvegarder les changements</button>
                                </div>

                            </form>

                        </div>


                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>

    </div>
</section>

@endsection
