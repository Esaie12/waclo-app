@extends('layout.template')

@section('titre', 'Nos Services')

@section('contenu')


<div class="sub-banner pt-80 pb-80">
    <div class="container">
        <div class="col-md-8  offset-md-2">
            <div class="text-center text-line">
                <h1>NETTOYAGE DE LOCAL COMMERCIAL</h1>
            </div>
        </div>
    </div>
</div>


<div class="about pt-80 pb-60 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="right-text">
                    <h4 class="upcase linetext pl-70">NETTOYAGE DE LOCAL COMMERCIAL</h4>
                    <h2>
                        Des prestations de nettoyage de local commercial adaptées
                    </h2>
                    <div class="company-aim mt-0">
                        <p>
                           Votre local commercial ou votre boutique propre et nettoyée.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="about bg-ser-details pt-0 p-20">
    <div class="container">
        <div class="row">
            <div class="col-md-6 pt-80 pb-80">
                <div class="ser-det-img">
                    <img src="{{asset('assets/img/local01.jpeg')}}" alt="" />
                </div>
            </div>

            <div class="col-md-6 bg-gray-ser-d pl-30">
                <div class="ser-d-right-text  mt-80 mb-80">
                    <div class="company-aim mt-0">
                        <p>
                            L’aspect de votre boutique ou local commercial va jouer un rôle prépondérant dans votre activité. En effet, l’image renvoyée à vos clients contribue directement à la réussite commerciale de votre entreprise. <br> <br>

                            C’est pour cette raison que le sujet du nettoyage de votre local commercial n’est pas anodin. Ce sont ces travaux d’entretien qui permettront à votre clientèle d’évoluer dans un environnement sain, agréable et rassurant.
                        </p>
                        <p>
                            Une prestation flexible qui vous convient le mieux, vos besoins seront nos obligations. Un devis fait en 24 h 00 et un conseiller technique pour vous accompagner, de l'élaboration du cahier des charges à la mise en place des prestations.
                        </p>
                    </div>
                </div>

                <div class="text-center">
                    <a href="{{route('devis')}}" class="btn btn-success">Demandez un devis gratuit</a>
                </div>



            </div>
        </div>
        <div class="row">
            <div class="col-md-3 my-4">
                <div class="box-s-gray">
                    <h3>Boutique</h3>
                    <p>
                        Une Boutique Propre pour vos clients. C'est ce qu'on sait faire de mieux !
                    </p> <br> <br>
                </div>
            </div>
            <div class="col-md-3 my-4">
                <div class="box-s-gray">
                    <h3>Showroom</h3>
                    <p>
                       Nous nettoyons tout le showroom afin de mettre en valeur au maximum votre exposition.
                    </p><br>
                </div>
            </div>
            <div class="col-md-3 my-4">
                <div class="box-s-gray">
                    <h3>Banques</h3>
                    <p>
                        Contactez-nous pour découvrir ce que nos agents peuvent faire pour vous.
                    </p><br><br>
                </div>
            </div>
            <div class="col-md-3 my-4">
                <div class="box-s-gray">
                    <h3>Hotels</h3>
                    <p>
                        Nos partenaires dans l'hottelerie apprécient nos techniques et notre savoir-faire.
                    </p><br>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
