@extends('layout.template')
@section('titre', 'Contact')

@section('contenu')

<div class="sub-banner pt-80 pb-80">
    <div class="container">
        <div class="col-md-8  offset-md-2">
            <div class="text-center text-line">
                <h1>Faites une demande de  devis</h1>
                <ul class="text-c">
                    <li><a href="{{route('index')}}">Accueil</a></li>
                    <li>|</li>
                    <li class="color-t"> Faire un devis</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="request-home pt-90 pb-90">
    <div class="container">
        <div class="bg-w-re">
            <div class="row">
                <!--div class="col-md-4">
                    <div class="min-bg-or">
                        <div class="cont-one">
                            <h4>Notre adresse</h4>
                            <p>
                                Sikécodji à 800m de la place Bicentenaire, Cotonou BENIN
                            </p>
                        </div>
                        <div class="cont-one">
                            <h4>
                               Nous sommes ouverts tous les jours de la semaine de <br>
                                08h30 - 18h30.
                            </h4>
                        </div>
                        <div class="cont-one">
                            <a href="tel:+229 94771772" ><span class=""><i class="fa fa-phone"></i></span> +229 94 77 17 72</a>
                        </div>
                    </div>
                </div-->

                <div class="col-md-12">
                    <div class="form-send pl-30 pr-30">
                        <h3>Demander un devis</h3>
                        @if(Session::get('msg'))
                        <div class="alert alert-success" role="alert">
                            <strong>Votre demande a été envoyée avec succès. Un devis vous sera envoyé par mail sous 24h au plus.</strong>
                        </div>
                        @else
                        <p class="d-lg-block d-none" >
                            Avec un devis formulé en 24h, nous étudions vos besoins et vous proposons une offre personnalisée (type de prestation, fréquence, …) avec une équipe de nettoyage qui vous est dédiée. Vous découvrez des prestations précisément adaptées à vos locaux plutôt que des formules génériques, vos coûts sont optimisés.
                        </p>
                        @endif

                        <form method="post" action="{{route('send_devis')}}" class="form-re">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for=""><strong >De quel type d'espace s'agit -il ?</strong> <sup class="text-danger">*</sup> </label>
                                    @php
                                    $tab1 = array('Locaux Professionnels / Bureau', 'Magasin / Commerce', 'Immeuble / Maison', 'Hotels', 'Etablissement Publique',
                                    "Autres");
                                    @endphp
                                    <select name="espace" id="" class="form-control" >
                                        @foreach ($tab1 as $item)
                                            <option @if(old('espace') == $item) selected @endif value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                    @error('espace')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>

                                <div class="col-md-4 form-group">
                                    <label for=""><strong>A quelle fréquence faut-il intervenir ? <sup class="text-danger">*</sup> </strong> </label>
                                    @php
                                    $tab2 = array( "Quotidiennement","5 fois par semaine" ,"4 fois par semaine" ,"3 fois par semaine" ,"2 fois par semaine",
                                        "1 fois par semaine","2 fois par mois",
                                        "1 fois par mois", "Ponctuelle ou Récurente", "Autres"
                                );
                                    @endphp
                                    <select name="frequence" id="" class="form-control" >
                                        @foreach ($tab2 as $item)
                                            <option value="{{$item}}" @if(old('frequence') == $item) selected @endif >{{$item}}</option>
                                        @endforeach
                                    </select>
                                    @error('frequence')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>

                                <div class="col-md-4 form-group">
                                    <label for=""><strong>Quelle est la surface de l'espace à nettoyer ? <sup class="text-danger">*</sup> </strong></label>
                                    @php
                                    $tab3 = array(
                                        "Moins de 50 m²","50 m² à 100 m²","100 m² à 200 m²",
                                        "200 m² à 300 m²","300 m² à 500 m²",
                                        "500 m² à 1000 m²","Plus de 1000 m²"
                                );

                                    @endphp
                                    <select name="surface" id="" class="form-control" >
                                        @foreach ($tab3 as $item)
                                            <option @if(old('surface') == $item) selected @endif value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                    @error('surface')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>

                                <div class="col-md-4 form-group">
                                    <label for=""><strong>Démarrage approximatif du projet <sup class="text-danger">*</sup> </strong></label>
                                    @php
                                    $tab4 = array(
                                        "D'ici une semaine","D'ici un mois","D'ici deux mois",
                                        "D'ici trois mois","D'ici six mois"
                                );
                                    @endphp
                                    <select name="demarrage" id="" class="form-control" >
                                        @foreach ($tab4 as $item)
                                        <option @if(old('demarrage') == $item) selected @endif  value="{{$item}}">{{$item}}</option>
                                        @endforeach

                                    </select>
                                    @error('demarrage')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for=""><strong>Nombre de collaborateur</strong></label>
                                        <input type="number" value="{{@old('collabo_society',2)}}" name="collabo_society" value="{{@old('collabo_society')}}" placeholder="Ex: BTP , Start UP " class="form-control" />
                                        @error('collabo_society')
                                        <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for=""><strong>Nom & Prénoms <sup class="text-danger">*</sup> </strong></label>
                                        <input type="text" name="your_name" value="{{@old('your_name')}}" placeholder="Ex: MOUSSA Pactrice" class="form-control" />
                                        @error('your_name')
                                        <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for=""><strong>Adresse Email <sup class="text-danger">*</sup> </strong></label>
                                        <input type="text" name="email" value="{{@old('email')}}" placeholder="Ex :  ........@gmail.com " class="form-control" />
                                        @error('email')
                                        <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for=""><strong>Numéro de Téléphone <sup class="text-danger">*</sup> </strong></label>
                                        <input type="text" name="telephone" value="{{@old('telephone')}}" placeholder="Ex: +229 85 85 85 85" class="form-control" />
                                        @error('telephone')
                                        <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for=""><strong>Nom de la société </strong></label>
                                        <input type="text" value="{{@old('name_society')}}" name="name_society" placeholder="Ex: Nom de la société" class="form-control" />
                                        @error('name_society')
                                        <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for=""><strong>Informations supplémentaires</strong></label>
                                        <textarea name="others" placeholder="Autres informations qu'on doit savoir sur vous ?"
                                            class="form-control">{{@old('others')}}</textarea>
                                    </div>
                                </div>


                            </div>
                            <div class=" row">
                                <div class="col-12">
                                    <strong>Quelles sont les prestations dont vous avez besoins ? <sup class="text-danger">*</sup> </strong>
                                    @error('services')
                                        <strong class="text-danger">Veuillez cocher un besoin au moins.</strong>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex justify-content-arround">
                                        <input type="checkbox" name="services[]" value="Passage de l'aspirateur" id="">
                                        <div class="ml-2" >Passage de l'aspirateur</div>
                                    </div>
                                    <div class="d-flex justify-content-arround">
                                        <input type="checkbox" name="services[]" value="Dépoussièrage des murs et meubles" id="">
                                        <div class="ml-2" >Dépoussièrage des murs et meubles</div>
                                    </div>
                                    <div class="d-flex justify-content-arround">
                                        <input type="checkbox" name="services[]" value="Nettoyage des sanitaires" id="">
                                        <div class="ml-2" >Nettoyage des sanitaires</div>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="d-flex justify-content-arround">
                                        <input type="checkbox" name="services[]" value="Nétoyage des vitres" id="">
                                        <div class="ml-2" >Nétoyage des vitres</div>
                                    </div>
                                    <div class="d-flex justify-content-arround">
                                        <input type="checkbox" name="services[]" value="Nétoyage du sol" id="">
                                        <div class="ml-2" >Nétoyage du sol</div>
                                    </div>
                                    <div class="d-flex justify-content-arround">
                                        <input type="checkbox" name="services[]" value="Nétoyage de cuisine(s)" id="">
                                        <div class="ml-2" >Nétoyage de cuisine(s)</div>
                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <div class="d-flex justify-content-arround">
                                        <input type="checkbox" name="services[]" value="Rangement / Organisation de l'espace" id="">
                                        <div class="ml-2" >Rangement / Organisation de l'espace</div>
                                    </div>
                                    <div class="d-flex justify-content-arround">
                                        <input type="checkbox" name="services[]" value="Autres besoins" id="">
                                        <div class="ml-2" >Autres besoins</div>
                                    </div>
                                </div>
                            </div>

                            <div class=" row">
                                <div class="col-md-12">
                                    <div class="form-group mt-30 mb-0">
                                        <button type="submit" class="btn blue-btn">
                                            Faire la demande de devis <i class="fa fa-arrow-right"></i>
                                            <span style="top: 176.578px; left: 137.5px;"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
