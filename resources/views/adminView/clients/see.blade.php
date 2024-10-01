<x-admin-layout>
    <x-slot name="titre">Voir client</x-slot>

    <x-slot name="client_menu"> show</x-slot>
    <x-slot name="client_liste">active</x-slot>

    <div class="pagetitle">
        <h1>Voir client <span class="text-primary">{{$data->name}}</span> </h1>
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
            <div class="col-lg-12 mb-2">
                <a href="{{route('admin.clients.delete_client',$data->id)}}" onclick="return confirm('Voulez-vous vraiement supprimer ce client ?')" class="btn btn-outline-danger">Supprimer le client</a>
            </div>
            <div class="col-xl-12">

                <div class="card">
                    <div class="card-body pt-3">

                        <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">

                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview"
                                    aria-selected="true" role="tab">Informations</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit"
                                    aria-selected="false" role="tab" tabindex="-1">Modifier Profil</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#contrat"
                                    aria-selected="false" role="tab" tabindex="-1">Historique contrat</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#programme"
                                    aria-selected="false" role="tab" tabindex="-1">Programmes de passage</button>
                            </li>


                        </ul>

                        <div class="tab-content pt-2">

                            <div class="tab-pane fade profile-overview active show" id="profile-overview" role="tabpanel">
                                <x-admin.details-devis question="Nom  & Prénoms Ou raison sociale " reponse="{{$data->name}}" />
                                <x-admin.details-devis question="Type de client" reponse="{{$data->type_client}}" />
                                <x-admin.details-devis question="Email" reponse="{{$data->email}}" />
                                <x-admin.details-devis question="Téléphone" reponse="{{$data->telephone}}" />
                                <x-admin.details-devis question="Adresse" reponse="{{$data->adresse}}" />
                                <x-admin.details-devis question="Date d'enregistrement" reponse="{{$data->date_sign}}" />
                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit" role="tabpanel">

                                <form method="post" action="{{route('admin.clients.update')}}" >
                                    @csrf
                                    <input type="hidden" name="idUser" value="{{$data->id}}" >

                                    <div class="row mb-3">
                                        <label for="about" class="col-md-6 col-lg-6 col-form-label">Nom & Prénoms du clients ou ( Nom de la société)</label>
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
                                        <label for="about" class="col-md-6 col-lg-6 col-form-label">Email</label>
                                        <div class="col-md-6 col-lg-6">
                                            <input type="email" name="email" value="{{@old('email',$data->email)}}" class="form-control" id="inputEmail5">
                                            @error('email')
                                                <strong class="text-danger">{{$message}}</strong>
                                            @enderror
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
                                        <button type="submit" class="btn btn-primary">Sauvegarder les changements</button>
                                    </div>
                                </form>

                            </div>

                            <div class="tab-pane fade pt-3" id="contrat" role="tabpanel">

                                <!--form>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email
                                            Notifications</label>
                                        <div class="col-md-8 col-lg-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="changesMade" checked="">
                                                <label class="form-check-label" for="changesMade">
                                                    Changes made to your account
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="newProducts" checked="">
                                                <label class="form-check-label" for="newProducts">
                                                    Information on new products and services
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="proOffers">
                                                <label class="form-check-label" for="proOffers">
                                                    Marketing and promo offers
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="securityNotify"
                                                    checked="" disabled="">
                                                <label class="form-check-label" for="securityNotify">
                                                    Security alerts
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form-->

                            </div>

                            <div class="tab-pane fade pt-3" id="programme" role="tabpanel">

                                <!--form>

                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control"
                                                id="currentPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control" id="newPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control"
                                                id="renewPassword">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form-->

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

</x-admin-layout>
