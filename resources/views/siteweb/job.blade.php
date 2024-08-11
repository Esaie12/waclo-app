@extends('layout.template')
@section('titre', 'Travaillez avec nous')

@section('contenu')

<div class="sub-banner pt-80 pb-80">
    <div class="container">
        <div class="col-md-8  offset-md-2">
            <div class="text-center text-line">
                <h1>Travaillez avec nous</h1>
                <ul class="text-c">
                    <li><a href="{{route('index')}}">Accueil</a></li>
                    <li>|</li>
                    <li class="color-t"> Travaillez avec nous</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="request-home pt-90 pb-90">
    <div class="container">
        <div class="card">
            <div class="card-body row">

                <div class="col-md-12">
                    <div class="form-send pl-30 pr-30">
                        <h3>Remplissez le formulaire ci-dessous</h3>
                        @if(Session::get('msg'))
                        <div class="alert alert-success" role="alert">
                            <strong>Votre demande a été envoyée avec succès. Nous vous contactez d'ici peu pour un entretien. Merci.</strong>
                        </div>
                        @else
                        <p class="d-lg-block d-none" >
                            Chez Waclo, nous sommes ouvert à toute collaboration. Vous avez envie de travaillez avec nous ? Envoyez nous
                            certaines informations et nous vous contacterons si peu.
                        </p>
                        @endif

                        <form method="post" action="{{route('send_demande')}}" class="form-re">
                            @csrf
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for=""><strong>Nom & Prénoms <sup class="text-danger">*</sup> </strong></label>
                                        <input type="text" name="your_name" value="{{@old('your_name')}}" placeholder="Ex: MOUSSA Pactrice" class="form-control" />
                                        @error('your_name')
                                        <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 form-group">
                                    <label for=""><strong>Sexe <sup class="text-danger">*</sup> </strong></label>
                                    @php
                                    $tab4 = array(
                                        "Masculin",
                                        "Feminin" );
                                    @endphp
                                    <select name="sexe" id="" class="form-control" >
                                        @foreach ($tab4 as $item)
                                        <option @if(old('sexe') == $item) selected @endif  value="{{$item}}">{{$item}}</option>
                                        @endforeach

                                    </select>
                                    @error('sexe')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
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
                                        <label for=""><strong>Age</strong></label>
                                        <input type="number" min="15" value="{{@old('age',18)}}" name="age" placeholder="Ex: Nom de la société" class="form-control" />
                                        @error('age')
                                        <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for=""><strong>Vous résidez où ?</strong></label>
                                        <input type="text" min="" value="{{@old('adresse')}}" name="adresse" placeholder="Ex: Cotonou, Agla" class="form-control" />
                                        @error('adresse')
                                        <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for=""><strong>Informations supplémentaires</strong></label>
                                        <textarea name="others" placeholder="Parlez-nous de vous en 3 lignes."
                                            class="form-control">{{@old('others')}}</textarea>
                                            @error('others')
                                        <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                </div>


                            </div>

                            <div class=" row">
                                <div class="col-md-12">
                                    <div class="form-group mt-30 mb-0">
                                        <button type="submit" class="btn blue-btn">
                                            Envoyez la demande <i class="fa fa-arrow-right"></i>
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
