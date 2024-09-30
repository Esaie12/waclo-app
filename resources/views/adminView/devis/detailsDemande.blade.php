
<x-admin-layout>
    <x-slot name="titre">Devis Details</x-slot>

    <x-slot name="devi_menu"> show</x-slot>
    <x-slot name="devi_new">active</x-slot>

<div class="pagetitle">
    <h1>Voir en détails une demande de devis</h1>
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

            @if($devis->traiter == 0)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Repondre à la demande du client</h5>
                    <span class="text-primary">
                        Une fois la demandé étudiée, stockez la facture proformat dans ce formulaire. <br>
                        Merci !!
                    </span>
                    <!-- Vertical Form -->
                    <form class="row g-3 mt-3" enctype="multipart/form-data" method="post" action="{{route('admin.devis.valide')}}" >
                        @csrf
                        <input type="hidden" name="idDemande" value="{{$devis->id}}" >
                        <div class="col-12">
                            <label for="inputNanme4" class="form-label">Facture proformat</label>
                            <input type="file" name="facture" class="form-control" id="inputNanme4">
                            @error('facture')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-4 btn-block">Sauvegarder</button>
                        </div>
                    </form>

                </div>
            </div>
            @else
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Demande deja traitée</h5>

                    <a href="{{asset(env('start').$devis->fichier_send)}}" target="__blank" class="btn btn-outline-primary">Voir la facture envoyée</a>

                    <div class="mt-3" >
                        Traiter par :
                        {{$admins->name." ".$admins->firstname}}
                    </div>
                    <div>
                        Traiter le:
                        {{$devis->date_traitement}}
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
                        <x-admin.details-devis question="De quel type d'espace s'agit -il ? "
                            reponse="{{$devis->espace}}" />
                        <x-admin.details-devis question="A quelle fréquence faut-il intervenir ?"
                            reponse="{{$devis->frequence}}" />
                        <x-admin.details-devis question="Quelle est la surface de l'espace à nettoyer ? "
                            reponse="{{$devis->surface}}" />
                        <x-admin.details-devis question="Démarrage approximatif du projet "
                            reponse="{{$devis->demarrage}}" />
                        <x-admin.details-devis question="Nombre de collaborateur"
                            reponse="{{$devis->collabo_society}}" />
                        <x-admin.details-devis question="Nom & Prénoms" reponse="{{$devis->your_name}}" />
                        <x-admin.details-devis question="Adresse Email " reponse="{{$devis->email}}" />
                        <x-admin.details-devis question="Numéro de Téléphone" reponse="{{$devis->telephone}}" />
                        <x-admin.details-devis question="Nom de la société" reponse="{{$devis->name_society}}" />
                        <x-admin.details-devis question="Informations supplémentaires" reponse="{{$devis->others}}" />
                        <x-admin.details-devis question="Date de la demande" reponse="{{$devis->date_emission}}" />

                        <div class="row mb-3">
                            <div class="col-lg-6 col-md-6 label text-primary">Les services voulus sont:</div>
                            <div class="col-lg-6 col-md-6">
                                <ul>

                                    <?php
                                    $tab = json_decode( $devis->services, true );
                                    foreach ($tab as $key => $value): ?>
                                    <li>{{ $value }}</li>
                                    <?php endforeach ?>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

</x-admin-layout>


