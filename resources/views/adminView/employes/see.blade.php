<x-admin-layout>
    <x-slot name="titre">Voir un employé</x-slot>

    <x-slot name="employes_menu"> show</x-slot>
    <x-slot name="employes_list">active</x-slot>

    <div class="pagetitle">
        <h1>Voir l'employé <span class="text-primary"> {{$employe->name}} </span> </h1>
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
                <a class="btn btn-outline-danger" onclick="return confirm('Vous voulez vous vraiment supprimer cet employé ?')" href="{{route('admin.employes.delete_empl',$employe->id)}}">Supprimer cet employé</a>
            </div>
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        @if($employe->photo == null)
                        <img style="width: 150px" src="{{asset('assets/img/default-profil.png')}}" alt="Profile"
                            class="rounded-circle">
                        @else
                        <img style="width: 150px" src="{{asset(env('start').$employe->photo)}}" alt="Profile"
                            class="rounded-circle">
                        @endif
                        <h2>{{$employe->name}}</h2>
                        <h6>Employé depuis : {{$employe->date_create}} </h6>

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

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings"
                                    aria-selected="false" tabindex="-1" role="tab">Paramètres</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview" role="tabpanel">

                                <h5 class="card-title">Details Profil</h5>

                                <x-admin.details-devis question="Nom & Prénoms" reponse="{{$employe->name}}" />
                                <x-admin.details-devis question="Sexe" reponse="{{$employe->sexe}}" />
                                <x-admin.details-devis question="Email" reponse="{{$employe->email}}" />
                                <x-admin.details-devis question="Date de Naissance" reponse="{{$employe->birthday}}" />
                                <x-admin.details-devis question="Addresse" reponse="{{$employe->adresse}}" />
                                <x-admin.details-devis question="Numéro de téléphone" reponse="{{$employe->telephone}}" />
                                <x-admin.details-devis question="Date de prise de fonction"
                                    reponse="{{$employe->date_fonction}}" />
                                <x-admin.details-devis question="Date de Fin de contrat"
                                    reponse="{{$employe->date_fin_contrat}}" />
                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit" role="tabpanel">

                                <!-- Profile Edit Form -->
                                <form method="POST" action="{{route('admin.employes.update')}}" >
                                    @csrf
                                    <input type="hidden" name="idEmploye" value="{{$employe->id}}" >

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
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="email" class="form-control" id="inputEmail5" name="email"
                                                value="{{@old('email',$employe->email)}}">
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Mot de passe</label>
                                        <div class="col-md-8 col-lg-9">
                                            <i class="text-primary">A renseigner si seulement vous voulez changer l'ancien</i>
                                            <input type="text" class="form-control" name="password" value="{{@old('password')}}"
                                                id="inputAddres5s" placeholder="5 caractère miniumm">
                                            @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Téléphone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" class="form-control" id="inputPassword5" name="telephone"
                                                value="{{@old('telephone',$employe->telephone)}}">
                                            @error('telephone')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Adresse</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" class="form-control" name="adresse"
                                                value="{{@old('adresse',$employe->adresse)}}" id="inputAddres5s" placeholder="1234 Main St">
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
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Date de prise de
                                            fonction</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="date" class="form-control" id="inputAddress2" placeholder=""
                                                name="date_fonction" value="{{@old('date_fonction',$employe->date_fonction)}}">
                                            @error('date_fonction')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Date de fin de
                                            contrat</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="date" class="form-control" id="inputAddress2" placeholder=""
                                                name="date_fin_contrat" value="{{@old('date_fin_contrat',$employe->date_fin_contrat)}}">
                                            @error('date_fin_contrat')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Sauvegarder les changements</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-settings" role="tabpanel">

                                <!-- Settings Form -->
                                <form method="post" action="{{route('admin.employes.setting')}}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <input type="hidden" name="idEmploye" value="{{$employe->id}}">
                                        <div class="col-md-6">
                                            <div>
                                                <label for="inputZip" class="form-label">Photo de l'employé</label>
                                                <input type="file" class="form-control" id="inputZip" name="photo">
                                                @error('photo')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div>
                                                @if($employe->photo != null)
                                                <a target="" href="{{route('admin.employes.delete_photo',$employe->id)}}"
                                                    class="btn btn-outline-danger px-3">Supprimer la photo de l'employé</a>
                                                @else
                                                <strong class="text-info">L'employé n'a pas de photo</strong>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div>
                                                <label for="inputZip" class="form-label">Contrat de travail</label>
                                                <input type="file" class="form-control" id="inputZip" name="contrat">
                                                @error('contrat')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div>
                                                @if($employe->contrat != null)
                                                <a target="__blank" href="{{asset(env('start').$employe->contrat)}}"
                                                    class="btn btn-outline-primary px-3">Voir le contrat</a>
                                                @else
                                                <strong class="text-info">Vous n'avez pas enregistrer de contrat</strong>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End settings Form -->

                            </div>


                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
</x-admin-layout>

