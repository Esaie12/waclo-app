@extends('layout.template')

@section('titre', 'Nos Services')

@section('contenu')


<div class="sub-banner pt-80 pb-80">
    <div class="container">
        <div class="col-md-8  offset-md-2">
            <div class="text-center text-line">
                <h1>Nettoyage ponctuel & Remise en état des sols</h1>
            </div>
        </div>
    </div>
</div>


<div class="about pt-80 pb-60 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="right-text">
                    <h4 class="upcase linetext pl-70">Nettoyage ponctuel & Remise en état des sols</h4>
                    <h2>
                        Remise en état des sols & Entretien
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

        <div class="row">
            <div class="col-md-5 pt-80 pb-80">
                <div class="ser-det-img">
                    <img src="{{asset('assets/img/remise.jpeg')}}" alt="" />
                </div>
            </div>

            <div class="col-md-7 bg-gray-ser-d pl-30">
                <div class="ser-d-right-text  mt-80 mb-80">
                    <div class="company-aim mt-0">
                        <p>
                            Le nettoyage ponctuel est un service de nettoyage qui peut être effectué de manière sporadique ou sur une base régulière, en fonction des besoins spécifiques de l'espace à nettoyer. Il s'agit d'un service de nettoyage flexible qui peut être adapté en fonction des besoins du client. Le nettoyage ponctuel peut inclure des tâches telles que le nettoyage des vitres, le dépoussiérage des meubles, le nettoyage des sols et des tapis, le nettoyage des sanitaires, etc.
                        </p>
                        <p>
                            La remise en état des sols, quant à elle, est un processus visant à restaurer l'aspect neuf des sols qui ont subi des dommages ou qui ont été négligés pendant une période de temps. Les sols peuvent être endommagés par l'usure quotidienne, les taches, les rayures, les impacts, les changements de température et d'humidité, etc. La remise en état des sols peut être effectuée sur différents types de surfaces, telles que le carrelage, le marbre, le béton, le bois, le vinyle, etc.
                        </p>
                        <p>
                            Pour remettre en état les sols, notre équipe de professionnels utilise des techniques de nettoyage et de restauration avancées, ainsi que des produits de nettoyage spécifiques pour chaque type de surface. Nous effectuons une évaluation complète des sols pour déterminer le traitement approprié. Les étapes typiques de la remise en état des sols comprennent le nettoyage en profondeur, le ponçage, le polissage, le cirage, le scellage et la protection.
                        </p>
                        <p>
                            Chez notre entreprise de nettoyage, nous offrons des services de nettoyage ponctuels et de remise en état des sols pour les entreprises et les particuliers. Nous sommes équipés de tous les outils, produits et équipements nécessaires pour effectuer un nettoyage complet et efficace, tout en veillant à ne pas endommager vos surfaces. Nous sommes flexibles et pouvons travailler en dehors des heures d'ouverture de votre entreprise pour minimiser les perturbations pour vos employés et vos clients. Contactez-nous dès aujourd'hui pour en savoir plus sur nos services de nettoyage ponctuels et de remise en état des sols.
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
