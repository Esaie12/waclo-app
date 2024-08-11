@extends('app_layout.templateAgent')


@section('titre','Paramètres')

@section('contenu')
<div class="pagetitle">
    <h1>Paramètres</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Accueil</a></li>
            <!--li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">Blank</li-->
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Modifier votre mot de passe</h4>
                    <p class="card-text">
                        <form action="{{route('agent.setting.mdp')}}" method="post">
                            @csrf
                            @if(Session::get('msg-error'))
                            <div class="alert alert-success" role="alert">
                                <strong>{{Session::get('msg-error')}}</strong>
                            </div>
                            @endif

                            <div class="form-group mb-3">
                                <label for="">Ancien mot de passe</label>
                                <input type="text" name="old_password" id="" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                @error('old_password')
                                <small id="helpId" class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Nouveau mot de passe</label>
                                <input type="text" name="new_password" id="" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                @error('new_password')
                                <small id="helpId" class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Confirmer mot de passe</label>
                                <input type="text" name="confirm_password" id="" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                @error('confirm_password')
                                <small id="helpId" class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <button class="btn btn-primary px-3">Modifier le mot de passe</button>
                        </form>
                    </p>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Changer ma photo de profil</h4>
                    <p class="card-text">
                        <form method="post" action="{{route('agent.setting.setting')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div>
                                        <label for="inputZip" class="form-label">Photo de l'employé</label>
                                        <input type="file" class="form-control" id="inputZip" name="photo">
                                        @error('photo')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        @if($employe->photo != null)
                                        <a target="" href="{{route('agent.setting.delete_photo')}}"
                                            class="btn btn-outline-danger px-3">Supprimer ma photo</a>
                                        @else
                                        <strong class="text-info">L'employé n'a pas de photo</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Sauvegarder</button>
                            </div>
                        </form>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Mon Profil</h4>
                    <p class="card-text">
                        <form method="POST" action="{{route('agent.setting.update')}}">
                            @csrf

                            <div class="row mb-3">
                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nom & Prénoms</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control" id="inputName5" name="name"
                                        value="{{@old('name',$employe->name)}}">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Téléphone</label>
                                <div class="col-md-8 col-lg-9">
                                    <input readonly type="text" class="form-control" id="inputPassword5"
                                        name="telephone" value="{{@old('telephone',$employe->telephone)}}">
                                    @error('telephone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Adresse</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control" name="adresse"
                                        value="{{@old('adresse',$employe->adresse)}}" id="inputAddres5s"
                                        placeholder="1234 Main St">
                                    @error('adresse')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Date de
                                    naissance</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="date" class="form-control" id="inputAddress2" name="birthday"
                                        value="{{@old('birthday',$employe->birthday)}}" placeholder="">
                                    @error('birthday')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Sexe</label>
                                <div class="col-md-8 col-lg-9">
                                    <select id="inputState" class="form-select" name="sexe">
                                        <option value="Masculin" selected="">Masculin</option>
                                        <option value="Feminin">Feminin</option>
                                    </select>
                                    @error('sexe')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>



                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Sauvegarder les changements</button>
                            </div>
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
