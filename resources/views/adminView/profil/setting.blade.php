@extends('app_layout.template')


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
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Modifier votre mot de passe</h4>
                    <p class="card-text">
                        <form action="{{route('admin.setting.mdp')}}" method="post">
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

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Changer ma photo de profil</h4>
                    <p class="card-text">
                        <form method="post" action="{{route('admin.collabo.photo')}}" enctype="multipart/form-data">
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
                                        @if(Auth::user()->photo != null)
                                        <a target="" href="{{route('admin.collabo.photo_del')}}"
                                            class="btn btn-outline-danger px-3">Supprimer ma photo</a>
                                        @else
                                        <strong class="text-info">Vous n'avez pas de photo</strong>
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
    </div>
</section>

@endsection
