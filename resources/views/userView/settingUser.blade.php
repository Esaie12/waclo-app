@extends('app_layout.templateUser')


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
                        <form action="{{route('setting.mdp')}}" method="post">
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
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Mon Profil</h4>
                    <p class="card-text">
                        <form method="post" action="{{route('setting.update')}}" >
                            @csrf

                            <div class="row mb-3">
                                <label for="about" class="col-md-6 col-lg-6 col-form-label">Nom & Prénoms ou ( Nom de la société)</label>
                                <div class="col-md-6 col-lg-6">
                                    <input type="text" class="form-control" id="inputName5" name="name" value="{{@old('name',$data->name)}}" >
                                    @error('name')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="about" class="col-md-6 col-lg-6 col-form-label">Type de client</label>
                                <div class="col-md-6 col-lg-6">
                                    <select name="type_client" id="" class="form-control" >
                                        <option value="">Chosir</option>
                                        <option @if(old('type_client',$data->type_client) == "Personne Physique") selected @endif  value="Personne Physique">Personne Physique</option>
                                        <option @if(old('type_client',$data->type_client) == "Personne Morale") selected @endif  value="Personne Morale">Personne Morale</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="about" class="col-md-6 col-lg-6 col-form-label">Addresse</label>
                                <div class="col-md-6 col-lg-6">
                                    <input type="text" name="adresse" value="{{@old('adresse',$data->adresse)}}" class="form-control" id="inputAddres5s" placeholder="1234 Main St">
                                    @error('adresse')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="about" class="col-md-6 col-lg-6 col-form-label">Téléphone</label>
                                <div class="col-md-6 col-lg-6">
                                    <input type="text" name="telephone" value="{{@old('telephone',$data->telephone)}}" class="form-control" id="inputAddres5s" placeholder="1234 Main St">
                                    @error('telephone')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                            </div>


                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Modifier mon profil</button>
                            </div>
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
