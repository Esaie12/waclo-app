<x-admin-layout>
    <x-slot name="titre">Détails de la demande</x-slot>

    <div class="pagetitle">
        <h1>Voir en détails une demande de travail</h1>
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
            <div class="col-xl-4">

                @if(Session::get('mg-success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{Session::get('msg-success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                @endif

                @if($jobs->traiter == 0)

                    @if($jobs->date_rdv == null)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Programmer un rendez-vous</h5>
                            <form class="row" enctype="multipart/form-data" method="post" action="{{route('admin.jobs.actions')}}" >
                                @csrf
                                <input type="hidden" name="idDemande" value="{{$jobs->id}}" >
                                <input type="hidden" name="action" value="1" >
                                <div class="col-12 mb-2">
                                    <label for="inputNanme4" class="form-label">Un rendez-vous pour le:</label>
                                    <input type="date" min="{{date('Y-m-d')}}" name="date_rdv" value="{{@old('date_rdv')}}" class="form-control" id="inputNanme4">
                                    @error('date_rdv')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-info px-4 btn-block">Programmez rendez-vous</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    @endif

                    @if($jobs->date_rdv != null)
                        @if($jobs->traiter == 0)

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Date du rendez-vous</h5>
                                <strong class="text-primary" >{{ $jobs->date_rdv }}</strong>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Dossier accepté, il devient un employé</h5>
                                <form class="row " enctype="multipart/form-data" method="post" action="{{route('admin.jobs.actions')}}" >
                                    @csrf
                                    <input type="hidden" name="idDemande" value="{{$jobs->id}}" >
                                    <input type="hidden" name="action" value="2" >

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success px-4 btn-block">Sauvegarder</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Rejetez le dossier</h5>
                                <form class="row" enctype="multipart/form-data" method="post" action="{{route('admin.jobs.actions')}}" >
                                    @csrf
                                    <input type="hidden" name="idDemande" value="{{$jobs->id}}" >
                                    <input type="hidden" name="action" value="3" >
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-danger px-4 btn-block">Confirmer</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                        @endif
                    @endif

                @else
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Demande deja traitée</h5>

                        @if($jobs->reject_dossier == 1)
                            <h2> <span class="badge bg-danger">Dossier rejeté</span></h2>
                        @else
                            <h2><span class="badge bg-success">Dossier Accepté</span></h2>
                        @endif
                        <div class="mt-3" >
                            Traiter par :
                            {{$admins->name." ".$admins->firstname}}
                        </div>
                        <div>
                            Traiter le:
                            {{$jobs->date_traitement}}
                        </div>



                    </div>
                </div>
                @endif

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title">Détails sur la demande emisse par le visiteur</h5>

                            <p class="mb-3">
                                <strong class="small fst-italic">
                                    Retrouvez ici, les différentes informations conçernant la société, ou le biens de
                                    l'utilisateur qui a fait la demande de devis.
                                </strong>
                            </p>
                            <x-admin.details-devis question="Sexe " reponse="{{$jobs->sexe}}" />
                            <x-admin.details-devis question="Age" reponse="{{$jobs->age}}" />
                            <x-admin.details-devis question="Nom & Prénoms" reponse="{{$jobs->your_name}}" />
                            <x-admin.details-devis question="Adresse Email " reponse="{{$jobs->email}}" />
                            <x-admin.details-devis question="Numéro de Téléphone" reponse="{{$jobs->telephone}}" />
                            <x-admin.details-devis question="Informations supplémentaires" reponse="{{$jobs->others}}" />
                            <x-admin.details-devis question="Date de la demande" reponse="{{$jobs->date_demande}}" />


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


</x-admin-layout>

