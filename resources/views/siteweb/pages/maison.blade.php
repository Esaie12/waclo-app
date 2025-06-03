@extends('layout.template')

@section('titre', 'Nos Services')

@section('contenu')


<div class="sub-banner pt-80 pb-80">
    <div class="container">
        <div class="col-md-8  offset-md-2">
            <div class="text-center text-line">
                <h1>NETTOYAGE DE COPROPRIÉTÉ</h1>
            </div>
        </div>
    </div>
</div>


<div class="about pt-80 pb-60 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="right-text">
                    <h4 class="upcase linetext pl-70">NETTOYAGE DE COPROPRIÉTÉ</h4>
                    <h2>
                        Une sous-traitance pour un nettoyage de copropriété en continu
                    </h2>
                    <div class="company-aim mt-0">
                        <p>
                            Une copropriété et votre immeuble propre et nettoyé
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
                    <img src="{{asset('assets/ia/sourrier.jpg')}}" alt="" />
                </div>
            </div>

            <div class="col-md-6 bg-gray-ser-d pl-30">
                <div class="ser-d-right-text  mt-80 mb-80">
                    <h3 class="">Une copropriété et votre immeuble propre et nettoyé</h3>
                    <div class="company-aim mt-0">
                        <p>
                            Les parties communes d’un immeuble en copropriété sont une zone de fort passage, pour garder ces espaces propres et agréables pour les résidents, nous vous proposons des prestations de nettoyage professionnel régulières.

                            L’apparence de votre immeuble joue un rôle crucial dans son attractivité et sa valorisation, c’est pourquoi il est important pour vous de sélectionner le partenaire idoine quant à la réalisation des tâches d’entretien et de nettoyage.

                            En nous confiant l’entretien de votre copropriété, vous profiterez des services d’une société de nettoyage reconnue, fiable et efficace.

                            Nos équipes de professionnels du nettoyage sont habitués aux méthodes de nettoyage pour votre immeuble afin de rendre votre copropriété propre et agréable.

                            La qualité étant au cœur de nos actions et de nos tâches, nous nous engageons à mettre notre expérience et notre rigueur au service de votre immeuble.
                        </p>
                    </div>

                    <div class="text-center">
                        <a href="{{route('devis')}}" class="btn btn-success">Demandez un devis gratuit</a>
                    </div>

                </div>



            </div>
        </div>

        <div class="row">
            <div class="col-md-6 my-4">
                <div class="box-s-gray">
                    <h3>Escaliers</h3>
                    <p>
                        Confiez nous le nettoyage de vos escaliers.
                    </p> <br>
                </div>
            </div>
            <div class="col-md-6 my-4">
                <div class="box-s-gray">
                    <h3>Showroom</h3>
                    <p>
                       Des espaces communs néttoyés régulièrement selon vos besoins.
                    </p><br>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection
