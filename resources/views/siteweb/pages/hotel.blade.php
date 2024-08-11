@extends('layout.template')

@section('titre', 'Nos Services')

@section('contenu')


<div class="sub-banner pt-80 pb-80">
    <div class="container">
        <div class="col-md-8  offset-md-2">
            <div class="text-center text-line">
                <h1>Nettoyage d'Hôtel-Restaurant</h1>
            </div>
        </div>
    </div>
</div>


<div class="about pt-80 pb-60 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="right-text">
                    <h4 class="upcase linetext pl-70">Nettoyage d'Hôtel-Restaurant</h4>
                    <h2>
                        Nettoyage professionnel de votre Hôtel ou Restaurant pour bien recevoir
                    </h2>
                    <!--div class="company-aim mt-0">
                        <p>
                            La propreté des bureaux est un impératif incontournable pour toute société qui souhaite
                            offrir à ses salariés un cadre de travail optimal.
                        </p>
                    </div-->
                </div>
            </div>
        </div>
    </div>
</div>


<div class="about bg-ser-details pt-0 p-20">
    <div class="container">
        <!--div class="row mb-5">
            <div class="col-md-4  my-4">
                <div class="box-s-gray">
                    <h3>Open Space</h3>
                    <p>
                        Nous effectuons tout le nettoyage du sol, des bureaux de vos open space.
                    </p> <br> <br>
                </div>
            </div>
            <div class="col-md-4  my-4">
                <div class="box-s-gray">
                    <h3>Salle de Reunion</h3>
                    <p>
                       Déléguez nous le nettoyage de vos salles de reunion.
                    </p><br> <br>
                </div>
            </div>
            <div class="col-md-4 my-4">
                <div class="box-s-gray">
                    <h3>N'importe quel type de cabinet</h3>
                    <p>
                        Nos agents d'entretien sont formés pour pouvoir néttoyer n'importe quel type de cabinet:
                        comptable, notarial, assurance,...
                    </p>
                </div>
            </div>
        </div-->

        <div class="row">
            <div class="col-md-5 pt-80 pb-80">
                <div class="ser-det-img">
                    <img src="{{asset('assets/img/hotel.jpg')}}" alt="" />
                </div>
            </div>

            <div class="col-md-7 bg-gray-ser-d pl-30">
                <div class="ser-d-right-text  mt-80 mb-80">
                    <div class="company-aim mt-0">
                        <p>
                            Nous comprenons l'importance d'un environnement propre et accueillant pour votre hôtel ou votre restaurant. C'est pourquoi nous offrons un service de nettoyage professionnel pour aider à préparer votre établissement à recevoir vos clients dans les meilleures conditions.
                        </p>
                        <p>
                            Notre équipe de professionnels du nettoyage possède l'expertise et l'expérience nécessaires pour répondre à vos besoins en matière de nettoyage. Nous travaillons en étroite collaboration avec vous pour comprendre vos besoins et vos exigences en matière de nettoyage afin de fournir un service sur mesure pour votre établissement.
                        </p>
                        <p>
                            Notre service de nettoyage professionnel pour hôtels et restaurants comprend un nettoyage complet de toutes les surfaces, y compris les sols, les murs, les plafonds, les meubles, les luminaires et les équipements de cuisine. Nous utilisons des produits de nettoyage de qualité supérieure pour éliminer efficacement la saleté, les taches et les odeurs, tout en assurant la sécurité alimentaire et la conformité aux normes de santé et de sécurité.
                        </p>
                        <p>
                            Nous offrons également des services de nettoyage spécialisés pour les chambres d'hôtel, les salles de bain, les cuisines et les espaces publics, y compris les restaurants et les salles de conférence. Nous sommes flexibles et pouvons travailler en dehors des heures d'ouverture de votre établissement pour minimiser les perturbations pour vos clients et votre personnel.
                        </p>
                        <p>
                            Notre objectif est de fournir un service de nettoyage de qualité supérieure qui vous permettra de vous concentrer sur ce que vous faites de mieux - offrir à vos clients une expérience exceptionnelle dans votre hôtel ou votre restaurant. Contactez-nous dès aujourd'hui pour en savoir plus sur notre service de nettoyage professionnel pour hôtels et restaurants.
                        </p>
                    </div>
                    <div class="text-center">
                        <a href="{{route('devis')}}" class="btn btn-success">Demandez un devis gratuit</a>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>


@endsection
