@extends('layout.template')

@section('titre', 'Nos Services')

@section('contenu')

<div class="sub-banner pt-80 pb-80">
    <div class="container">
        <div class="col-md-8  offset-md-2">
            <div class="text-center text-line">
                <h1>Nos Services</h1>
                <ul class="text-c">
                    <li><a href="{{route('index')}}">Accueil</a></li>
                    <li>|</li>
                    <li class="color-t"> Nos Services</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="about pt-30 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-md-6 pt-80 pr-40 pd-salf pd-top-s">
                <div class="right-text">
                    <h4 class="upcase linetext pl-70">Les services de wàcló</h4>
                    <h2>
                        Nous fournissons <br>
                        de meilleur service à nos clients.
                    </h2>
                    <div class="company-aim">
                        <!--p>
                            Chez wàcló, notre priorité absolue est de fournir le meilleur service possible à tous nos clients, quelle que soit leur taille ou leur type d'entreprise. Nous nous engageons à offrir une expérience de nettoyage sans souci en travaillant en étroite collaboration avec nos clients pour comprendre leurs besoins spécifiques et proposer des solutions sur mesure.
                        </p-->
                        <p>
                            Chez wàcló, nous sommes fiers de notre engagement envers l'excellence du service et nous sommes déterminés à fournir le meilleur service possible à tous nos clients, à chaque fois. Nous croyons que notre approche axée sur le client est la clé de notre succès et nous sommes impatients de continuer à offrir des services de nettoyage exceptionnels à nos clients dans tout le Bénin.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-6 pt-30 pl-150 pr-30">
                <div class="images-ser-r before-ani after-ani pr-40">
                    <img src="{{asset('assets/images/ser-left.png')}}" alt="" />
                    <div class="min-bg-ser alltuchtopdown d-none-m">
                        <h2>
                            Appelez-nous<br />
                            et Obtenez les<br />
                            meilleurs services
                        </h2>
                        <a href="tel:+1(817)9013377" class="call-b">
                            <i class="fa fa-phone"></i> +229 64 02 52 78
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="min-section min-section-ser pt-90 pb-90 cr-bg">
    <img src="{{asset('assets/images/ser-b.png')}}" alt="" class="po-img alltuchtopdown" />
    <div class="container">
        <div class="right-text ">
            <h4 class="upcase linetext pl-70">Nos Services</h4>
            <h2>
                A wàcló, Nous faisons le :
            </h2>
        </div>
        <!--div class="box-list mt-25">
            <div class="row">
                <div id="owl-demo5" class="owl-demo5 owl-carousel owl-theme pl-20 pr-20">
                    <div class="item">
                        <div class="box-con box-ser-l">
                            <span class="img-b">
                                <img src="{{asset('asset/images/target.png')}}" alt="">
                            </span>
                            <span class="num">1</span>
                            <div class="dis-con mt-20">
                                <h3>
                                    UPHOLSTERY CLEANING
                                </h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and type setting industry.
                                </p>
                                <a href="services-details.html">Read More...</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="box-con box-ser-l">
                            <span class="img-b">
                                <img src="{{asset('asset/images/layout.png')}}" alt="">
                            </span>
                            <span class="num">2</span>
                            <div class="dis-con mt-20">
                                <h3>
                                    House Cleaning
                                </h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and type setting industry.
                                </p>
                                <a href="services-details.html">Read More...</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="box-con box-ser-l">
                            <span class="img-b">
                                <img src="{{asset('asset/mages/order.png')}}" alt="">
                            </span>
                            <span class="num">3</span>
                            <div class="dis-con mt-20">
                                <h3>
                                    Building Cleaning
                                </h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and type setting industry.
                                </p>
                                <a href="services-details.html">Read More...</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="box-con box-ser-l">
                            <span class="img-b">
                                <img src="{{asset('assets/images/customer-feedback.png')}}" alt="">
                            </span>
                            <span class="num">4</span>
                            <div class="dis-con mt-20">
                                <h3>
                                    Commercial Cleaning
                                </h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and type setting industry.
                                </p>
                                <a href="services-details.html">Read More...</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="box-con box-ser-l">
                            <span class="img-b">
                                <img src="{{asset('assets/images/layout.png')}}" alt="">
                            </span>
                            <span class="num">5</span>
                            <div class="dis-con mt-20">
                                <h3>
                                    Apartment Cleaning
                                </h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and type setting industry.
                                </p>
                                <a href="services-details.html">Read More...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div-->
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Nettoyage de Bureau, Commerce & Surface commerciale</h4>
                        <p class="card-text">
                            <div>Le nettoyage en milieu commercial est perçu comme un vecteur d'image de marque.</div>
                            <p>
                                Offrez une expérience unique d'achat à vos clients avec un nettoyage professionnel de vos locaux commerciaux adapté à votre image.
                            </p>
                            <p>
                                Une prestation flexible qui vous convient le mieux, vos besoins seront nos obligations. Un devis fait en 24 h 00 et un conseiller technique pour vous accompagner, de l'élaboration du cahier des charges à la mise en place des prestations.

                            </p>
                            <a href="{{route('devis')}}" class="btn tn-success">Faire une demande de devis gratuitement</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="offset-md-2 col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Nettoyage Des Parties Communes, Maison Ou Appartement</h4>
                        <p class="card-text">
                            <p>
                                Vous n'avez pas le temps de s'occuper de l'entretien de votre maison ou appartement ? Vous souhaitez une désinfection parfaite de votre intérieur ? Vous voulez prendre soin du domicile d'un proche ?
                            </p>
                            <p>
                                wàcló vous accompagne dans l'entretien et la propreté de votre maison !
                            </p>
                            <p>
                                Vous n'habitez pas au quotidien dans votre appartement et souhaitez faire un grand ménage ? wàcló intervient pour le nettoyage et l'entretien de votre résidence secondaire.
                            </p>
                            <p>
                                Profitez de notre aide et ménage à domicile pour un intérieur propre, sain et bien rangé.
                            </p>
                            <div class="text-right">
                                <a href="{{route('devis')}}" class="btn tn-success">Faire une demande de devis gratuitement</a>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="about consulting-over pt-30 pb-30 pd-b-0">
    <div class="container">
        <div class="row">
            <div class="col-md-6 pt-80 pr-40 pd-top-s">
                <div class="right-text">
                    <h4 class="upcase linetext pl-70">Avec wàcló</h4>
                    <!--h2>
                        We Have 25 Years of<br />
                        Experience in Cleaning Service
                    </h2-->
                    <p>
                        Chez wàcló, nous croyons que notre approche axée sur le client est la clé de notre succès et nous sommes impatients de continuer à offrir des services de nettoyage exceptionnels à nos clients dans tout le Bénin.
                    </p>
                    <div class="company-aim mt-15 mb-20">
                        <ul class="wi-50-ser">
                            <li>Qualité supérieure </li>
                            <li>Équipe professionnelle</li>
                            <li>Flexibilité</li>
                            <li>Tarifs abordables</li>
                            <li>Satisfaction du client</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-6 pt-30 pl-140 pr-15 pd-salf pd-top-new">
                <div class="images-ser-r-two before-ani after-ani pr-0">
                    <img src="{{asset('assets/img/girl.jpeg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
