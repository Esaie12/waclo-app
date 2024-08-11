@extends('app_layout.template')


@section('titre','New Employe')

@section('contenu')
<div class="pagetitle">
    <h1>Enregistrer un nouveau employé</h1>
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
                    <h5 class="card-title">Renseignez les informations le concernant</h5>

                    <form enctype="multipart/form-data" class="row g-3" method="post" action="{{route('admin.employes.save_new')}}" >
                        @csrf
                        <div class="col-md-6">
                            <label for="inputName5" class="form-label">Nom & Prénoms</label>
                            <input type="text" class="form-control" id="inputName5" name="name"
                                value="{{@old('name')}}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail5" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail5" name="email"
                                value="{{@old('email')}}">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="inputPassword5" class="form-label">Téléphone</label>
                            <input type="text" class="form-control" id="inputPassword5" name="telephone"
                                value="{{@old('telephone')}}">
                            @error('telephone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="inputAddress5" class="form-label">Adresse de résidence</label>
                            <input type="text" class="form-control" name="adresse" value="{{@old('adresse')}}"
                                id="inputAddres5s" placeholder="1234 Main St">
                            @error('adresse')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="inputAddress5" class="form-label">Mot de passe</label>
                            <input type="text" class="form-control" name="password" value="{{ @old('password')}}"
                                id="inputAddres5s" placeholder="5 caractère miniumm">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-4">
                            <label for="inputAddress2" class="form-label">Date de naissance</label>
                            <input type="date" class="form-control" id="inputAddress2" name="birthday"
                                value="{{@old('birthday')}}" placeholder="">
                            @error('birthday')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="inputState" class="form-label">Sexe</label>
                            <select id="inputState" class="form-select" name="sexe">
                                <option value="Masculin" selected="">Masculin</option>
                                <option value="Feminin">Feminin</option>
                            </select>
                            @error('sexe')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="inputZip" class="form-label">Photo de l'employé</label>
                            <input type="file" class="form-control" id="inputZip" name="photo">
                            @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="inputAddress2" class="form-label">Date de prise de fonction</label>
                            <input type="date" class="form-control" id="inputAddress2" placeholder=""
                                name="date_fonction" value="{{@old('date_fonction')}}">
                            @error('date_fonction')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="inputAddress2" class="form-label">Date de fin de contrat</label>
                            <input type="date" class="form-control" id="inputAddress2" placeholder=""
                                name="date_fin_contrat" value="{{@old('date_fin_contrat')}}">
                            @error('date_fin_contrat')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="inputZip" class="form-label">Contrat de travail</label>
                            <input type="file" class="form-control" id="inputZip" name="contrat">
                            @error('contrat')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-5">Enregistrer</button>
                            <button type="reset" class="btn btn-secondary">Retour</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
