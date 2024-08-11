@extends('layout.template')

@section('titre', 'Nos Services')

@section('contenu')


<div class="sub-banner pt-80 pb-80">
    <div class="container">
        <div class="col-md-8  offset-md-2">
            <div class="text-center text-line">
                <h1>ENTRETIEN ET NETTOYAGE DE BUREAUX</h1>
            </div>
        </div>
    </div>
</div>


<div class="about pt-80 pb-60 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="right-text">
                    <h4 class="upcase linetext pl-70">ENTRETIEN ET NETTOYAGE DE BUREAUX</h4>
                    <h2>
                        Des prestations de nettoyage de bureaux adaptées
                    </h2>
                    <div class="company-aim mt-0">
                        <p>
                            La propreté des bureaux est un impératif incontournable pour toute société qui souhaite
                            offrir à ses salariés un cadre de travail optimal.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="about bg-ser-details pt-0 p-20">
    <div class="container">
        <div class="row mb-5">
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
        </div>

        <div class="row">
            <div class="col-md-4 pt-80 pb-80">
                <div class="ser-det-img">
                    <img src="{{asset('assets/img/burau.jpg')}}" alt="" />
                </div>
            </div>

            <div class="col-md-8 bg-gray-ser-d pl-30">
                <div class="ser-d-right-text  mt-80 mb-80">
                    <div class="company-aim mt-0">
                        <p>
                            Poussières et saletés envahissent facilement vos bureaux et open-spaces. Vous cherchez à
                            déléguer l’entretien de vos locaux à une société de nettoyage de bureau ? Waclo et ses
                            équipes d’experts vous accompagnent pour nettoyer vos bureaux selon vos besoins. Il est
                            essentiel d’avoir des solutions adaptées pour garder des bureaux propres. <br> <br>

                            À travers un cahier des charges précis nous vous proposons des prestations de nettoyage de
                            bureaux complètes, afin d’assurer un travail de qualité qui répond précisément à vos
                            besoins. Nos experts interviennent avec professionnalisme en dehors de vos horaires de
                            travail pour ne pas perturber vos collaborateurs dans leurs missions. Nous pouvons
                            intervenir pour du nettoyage de bureaux le soir ou même très tôt le matin. <br> <br>

                            Ils sont sensibilisés à toutes les règles d’hygiène et de sécurité pour laisser à vos
                            équipes un bureau sain et accueillant.
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
