@extends('layout.template')

@section('titre', "Accueil")

@section('contenu')
<style>
    #img-pri{

        border-radius: 75rem;
    }
</style>

<div class="minsection">

    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div data-swiper-autoplay="2000" class="swiper-slide cover-background" style="background-image:url({{asset('assets/img/local1.webp')}})">
                <div class="content-slider">
                    <h1 style="text-transform: uppercase" >
                        <!-- Plus qu'une entreprise de nettoyage -->
                       OPTEZ POUR UNE SOCIETE DE <br> NETTOYAGE PROFESSIONNELLE<br>
                        INNOVANTE ET ENGAGée.<br>
                    </h1>
                        <a href="{{route('devis')}}" class="btn mt-lg-0 mt-4">
                            Obtenez un Devis <i class="fa fa-arrow-right"></i>
                            <span style="top: 213.5px; left: 50.6406px;"></span>
                        </a>
                </div>
            </div>
            <div data-swiper-autoplay="2000"data-swiper-autoplay="2000" class="swiper-slide cover-background" style="background-image:url(https://www.deco.fr/sites/default/files/styles/slider_1000x500/public/2019-12/shutterstock_1058884367.jpg?itok=Ae8iLHyF) ; ">
                <div class="content-slider">
                    <h1 style="text-transform: uppercase"  >
                       <!-- Nous intervenons partout pour vos <br>
                         besoins de services d'entretien <br> Bureaux, commerces, immeubles, ..-->
                         Nous intervenons partout <br>
                         pour vos besoins de <br>
                         services d'entretien.
                    </h1>
                    <a href="{{route('devis')}}" class="btn mt-lg-0 mt-4">
                        Obtenez un Devis <i class="fa fa-arrow-right"></i>
                        <span style="top: 213.5px; left: 50.6406px;"></span>
                    </a>
                </div>
            </div>
            <div data-swiper-autoplay="2000" class="swiper-slide cover-background" style="background-image:url({{asset('assets/images/banner1.png')}})">
                <div class="content-slider animated fadeInLeft animate__delay-2s">
                    <h1 style="text-transform: uppercase">
                       <!-- Nous vous proposons des prestations complètes et adaptées <br>
                        Interventions régulières ou ponctuelles -->
                        Obtenez des prestations complètes <br>
                        et adaptées en intervention <br>
                        régulières ou ponctuelles.
                    </h1>
                    <a href="{{route('devis')}}" class="btn mt-lg-0 mt-4">
                        Obtenez un Devis <i class="fa fa-arrow-right"></i>
                        <span style="top: 213.5px; left: 50.6406px;"></span>
                    </a>
                </div>
            </div>

            <div data-swiper-autoplay="2000" class="swiper-slide cover-background" style="background-image:url({{asset('assets/images/banner1.png')}})">
                <div class="content-slider animated fadeInLeft animate__delay-2s">
                    <h1 style="text-transform: uppercase">
                        Concluez des Contrats <br> de nettoyage <br>
                        sans engagement.
                    </h1>

                    <a href="{{route('devis')}}" class="btn mt-lg-0 mt-4">
                        Obtenez un Devis <i class="fa fa-arrow-right"></i>
                        <span style="top: 213.5px; left: 50.6406px;"></span>
                    </a>
                </div>
            </div>

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <div class="about-section pt-50 pb-90 ">
        <div class="container">
            <div class="row">
                <!--div class="col-md-6">
                    <div class="left-image">
                        <span class="cricle alltuchtopdown "></span>
                        <img id="img-pri" src=" {{asset('assets/img/about.avif')}}" alt="" />
                        <div class="min-bg alltuchtopdown d-lg-block d-none">
                            <h1>Au Benin</h1>
                            <h3>Nous sommes N°1</h3>
                        </div>
                    </div>
                </div-->
                <div class="col-md-6 pt-50 pl-60 pr-30 mt-5">
                    <div class="left-image"><!-- local0.png -->
                        <img src=" {{asset('assets/img/menage-bureau-entreprises.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-md-6 pt-50 pl-60 pr-30">
                    <div class="right-text">
                        <h4 class="upcase linetext pl-70">A propos de wàcló</h4>
                        <h3 style="text-transform: uppercase " >
                            wàcló , une entreprise humaine à votre service
                        </h3>
                        <p>
                            wàcló est une entreprise spécialisée dans les services de nettoyage
                            et d'entretien pour les particuliers et les entreprises. Nous sommes passionnés par la propreté et
                            la satisfaction de nos clients est notre priorité absolue. Avec une équipe expérimentée et des
                             techniques de nettoyage de pointe, nous sommes déterminés à fournir des
                            services de haute qualité pour répondre à tous vos besoins en matière de nettoyage.
                        </p>
                        <div class="company-aim">
                            <!--div class="com-one">
                                <span class="left-side-icon">
                                    <img src="{{asset('assets/images/focus.png')}}" alt="" />
                                </span>
                                <div class="right-side-text">
                                    <h3>Nettoyage hautement coté</h3>
                                    <p>
                                        Nous sommes fiers de fournir un service professionnel
                                        de qualité supérieure pour répondre aux besoins de chaque client.
                                    </p>
                                </div>
                            </div>
                            <div class="com-one mt-20">
                                <span class="left-side-icon orange">
                                    <img src="{{asset('assets/images/thought.png')}}" alt="" />
                                </span>
                                <div class="right-side-text">
                                    <h3>Professionnel de confiance</h3>
                                    <p>Nous sommes fiers de notre réputation en tant que
                                        fournisseur de services de nettoyage fiable et professionnel.</p>
                                </div>
                            </div-->
                            <div class="button-section mt-25">
                                <a href="{{route('about')}}" class="btn orange-btn">
                                    Savoir Plus Sur Nous <i class="fa fa-arrow-right"></i>
                                    <span style="top: 174.5px; left: 104.141px;"></span>
                                </a>
                                <!--span class="video-play">
                                    <a href="https://www.youtube.com/watch?v=pZVdQLn_E5w"
                                        class="btn play-video orange-btn ml-20 popup-youtube">
                                        <i class="fa fa-play"></i>
                                        <span style="top: 174.5px; left: 104.141px;"></span>
                                    </a>
                                    Play Video
                                </span-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="ful-section">
        <div class="row">
            <div class="col-md-4">
                <div class="top-section" style="background-image:url(images/d-1.png);">
                    <div class="d-content">
                        <h1>01</h1>
                        <h4>
                            <a href="{{route('services.bureau')}}">Nettoyage de Bureau</a>
                        </h4> <br> <br>
                        <p class="mb-30">
                           Vous cherchez à déléguer l'entretien de vos locaux à une société de nettoyage de bureau ?
                        </p>
                        <div class="text-center">
                            <a href="{{route('devis')}}" class="btn btn-success">Obtenez un devis</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="top-section" style="background-image:url(images/d-2.png);">
                    <div class="d-content">
                        <h1>02</h1>
                        <h4> <a href="{{route('services.commerce')}}">Nettoyage des Commerces & Surfaces commerciale</a> </h4>
                        <p class="mb-30">
                            Nos interventions en boutique sur-mesure, au service de vos clients et partenaires.
                        </p> <br>
                        <div class="text-center">
                            <a href="{{route('devis')}}" class="btn btn-success">Obtenez un devis</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="top-section" style="background-image:url(images/d-3.png);">
                    <div class="d-content">
                        <h1>03</h1>
                        <h4>
                            <a href="{{route('services.maison')}}">
                                Nettoyage des parties communes, maisons ou appartements
                            </a>
                        </h4>
                        <p class="mb-30">
                           Nos agents sont formés pour intervenir sur l'entretien de tout type de lieu.
                        </p>
                        <div class="text-center">
                            <a href="{{route('devis')}}" class="btn btn-success">Obtenez un devis</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="min-section pt-90 pb-90 cr-bg">
        <img src="images/right-cr-bg.png" alt="" class="po-img alltuchtopdown" />
        <div class="container">
            <div class="right-text ">
                <!--h4 class="upcase linetext pl-70">Featuews Eco Cleanings</h4-->
                <h2>
                    Besoins de nettoyage spécifique ?
                </h2>
                <h5>
                    Après des travaux, suite à la réception d’un événement, pour des vitres ou des surfaces spécifiques :
                    wàcló  vous accompagne dans l’ensemble de vos besoins de nettoyage
                </h5>
            </div>
            <div class="box-list mt-55">
                <div class="row">
                    <!--div class="col-md-2">
                        <div class="po-text alltuchtopdown">
                            <h3>
                                Meilleure fonction de nettoyage écologique
                            </h3>
                            <p>Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.
                            </p>
                        </div>
                    </div-->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="img-box">
                                    <img src="{{asset('assets/img/fin-travaux.jpg')}}" alt="" />
                                    <a href="#" class="btn play-video d-button orange-btn ml-20 po-t-r">
                                        <i class="fa fa-arrow-right"></i>
                                        <span style="top: 174.5px; left: 104.141px;"></span>
                                    </a>
                                    <a href="#" class="f-name">Remise en état</a>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="img-box">
                                    <img src="{{asset('assets/img/pression2.jpg')}}" alt="" />
                                    <a href="#" class="btn play-video d-button orange-btn ml-20 po-t-r">
                                        <i class="fa fa-arrow-right"></i>
                                        <span style="top: 174.5px; left: 104.141px;"></span>
                                    </a>
                                    <a href="#" class="f-name">Nettoyage haute-pression</a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="img-box ">
                                    <img src="{{asset('assets/img/vitre.jpg')}}" alt="" />
                                    <a href="#" class="btn play-video d-button orange-btn ml-20 po-t-r">
                                        <i class="fa fa-arrow-right"></i>
                                        <span style="top: 174.5px; left: 104.141px;"></span>
                                    </a>
                                    <a href="#" class="f-name">Nettoyage des vitres</a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="img-box">
                                    <img src="{{asset('assets/img/moquette.jpg')}}" alt="" />
                                    <a href="#" class="btn play-video d-button orange-btn ml-20 po-t-r">
                                        <i class="fa fa-arrow-right"></i>
                                        <span style="top: 174.5px; left: 104.141px;"></span>
                                    </a>
                                    <a href="#" class="f-name">Shampouinage moquette</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="Consulting pt-90 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="img-con before-ani">
                        <img src="{{asset('assets/img/lust.jpg')}}" alt="" />
                        <div class="po-con alltuchtopdown">
                            <h3>Nous fournissons les meilleurs services de nettoyage</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pt-50 pl-20 pr-30 pad-top-s">
                    <div class="right-text">
                        <h2>
                            CE QUE NOUS OFFRONS
                        </h2>
                        <div class="company-aim">
                            <div class="com-one">
                                <span class="left-side-icon tran-bg">
                                    <img src="{{asset('assets/images/opration.png')}}" alt="">
                                </span>
                                <div class="right-side-text b-text">
                                    <h3>Nettoyage de Bureau, Commerce & Surface commerciale</h3>
                                    <p>Nous sommes engagés à fournir un service de qualité supérieure pour garantir la satisfaction de nos clients.</p>
                                </div>
                            </div>
                            <div class="com-one mt-20">
                                <span class="left-side-icon tran-bg">
                                    <img src="{{asset('assets/images/management.png')}}" alt="">
                                </span>
                                <div class="right-side-text b-text">
                                    <h3>Nettoyage des parties commune, maison ou appartement</h3>
                                    <p>Nous sommes engagés à fournir un service de qualité supérieure pour garantir la satisfaction de nos clients.</p>
                                </div>
                            </div>
                            <div class="button-section mt-25 ml-55">
                                <a href="{{route('service')}}" class="btn orange-btn">
                                    Découvrir nos services <i class="fa fa-arrow-right"></i>
                                    <span style="top: 174.5px; left: 104.141px;"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="why-choose">
        <div class="row">
            <div class="col-md-8 pt-90 pb-40 pl-70 pr-30">
                <div class="right-text ">
                    <h4 class="upcase linetext pl-70">POURQUOI NOUS CHOISIR</h4>
                    <h2>
                        Nous répondons à tous vos besoins de nettoyage
                    </h2>
                    <p>
                        En passant par wàcló, vous optez pour des prestations professionnelles de qualité. Nos agents ont la maitrise des règles d’hygiène et de propreté, ainsi que de tous les procédés.
                    </p>
                </div>
                <div class="min-s-list row pt-30">
                    <div class="col-md-4">
                        <div class="bg-sec-list mt-45">
                            <span class="l-img">
                                <img src="{{asset('assets/images/support.png')}}" alt="" />
                            </span>
                            <span class="text-w">1</span>
                            <h3>Nettoyeurs experts</h3>
                            <!--p>Lorem Ipsum is simply dummy text of the printing</p-->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-sec-list bg-blue">
                            <span class="l-img">
                                <img src="{{asset('assets/images/cms.png')}}" alt="" />
                            </span>
                            <span class="text-w">2</span>
                            <h3>Meilleurs équipements</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-sec-list mt-45">
                            <span class="l-img">
                                <img src="{{asset('assets/images/solution.png')}}" alt="" />
                            </span>
                            <span class="text-w">3</span>
                            <h3>Flexibilité et réactivité </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pd-0 text-center d-lg-block d-none ">
                <div class="full-img pt-lg-5 mt-lg-5"  >
                    <img style="height: 450px" src="{{asset('assets/img/man.jpeg')}}" alt="" />
                </div>
            </div>
        </div>
    </div>


    <div class="howitwork pt-90 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-t">
                        <h2>Comment nous fonctionnons</h2>
                        <p>
                           Pour s'octroyer les services de <br />
                            wàcló, c'est simple et rapide
                        </p>
                    </div>
                </div>
            </div>
            <div class="row pt-60">
                <div class="col-md-4">
                    <div class="how-sec">
                        <span class="before-line">
                            <img src="{{asset('assets/images/place.png')}}" alt="" />
                        </span>
                        <h4>Contactez-nous pour récevoir un dévis</h4>
                        <p>
                            Le dévis nous permet d'avoir connaisance des caractéristiques de vos locaux. Et de vous
                            soummetre un prix.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="how-sec">
                        <span class="before-line">
                            <img src="{{asset('assets/images/owner.png')}}" alt="" />
                        </span>
                        <h4>Valider le dévis , Donnez nous vos horaires</h4>
                        <p>
                            Une fois le dévis accepté, donnez nous vos horaires pour que nous puissons passer faire
                            l'entretion ou le nettoyage.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="how-sec no-be">
                        <span class="before-line">
                            <img src="{{asset('assets/images/reserved.png')}}" alt="" />
                        </span>
                        <h4>Profitez du service personnalisé</h4>
                        <p>
                            En vus d'avoir un partenariat en long terme avec nous, contactez-nous et nous discuterons.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--div class="Testimonials home-test pt-90 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-t">
                        <h2>Nos témoignages</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipiscing.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row pt-40">
                <div id="owl-demo5" class="owl-demo5 owl-carousel owl-theme">
                    <div class="item">
                        <div class="testmonial-box">
                            <div class="img-text-top">
                                <span class="img-user">
                                    <img src="images/author-thumb-3.jpg" alt="" />
                                </span>
                                <div class="right-t">
                                    <h4>Marvin Kinney</h4>
                                    <p>Designer</p>
                                    <ul class="test-rating">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="dis-test">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testmonial-box">
                            <div class="img-text-top">
                                <span class="img-user">
                                    <img src="images/team-image-4.jpg" alt="" />
                                </span>
                                <div class="right-t">
                                    <h4>Marvin Kinney</h4>
                                    <p>Designer</p>
                                    <ul class="test-rating">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="dis-test">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testmonial-box">
                            <div class="img-text-top">
                                <span class="img-user">
                                    <img src="images/team-image-3.jpg" alt="" />
                                </span>
                                <div class="right-t">
                                    <h4>Marvin Kinney</h4>
                                    <p>Designer</p>
                                    <ul class="test-rating">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="dis-test">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testmonial-box">
                            <div class="img-text-top">
                                <span class="img-user">
                                    <img src="images/author-thumb-5.jpg" alt="" />
                                </span>
                                <div class="right-t">
                                    <h4>Marvin Kinney</h4>
                                    <p>Designer</p>
                                    <ul class="test-rating">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="dis-test">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testmonial-box">
                            <div class="img-text-top">
                                <span class="img-user">
                                    <img src="images/author-thumb-4.jpg" alt="" />
                                </span>
                                <div class="right-t">
                                    <h4>Marvin Kinney</h4>
                                    <p>Designer</p>
                                    <ul class="test-rating">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="dis-test">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div-->


    <!--div class="Blog-section pt-90 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-t">
                        <h2>From Our Blog</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipiscing
                        </p>
                    </div>
                </div>
            </div>
            <div class="row pt-40">
                <div class="col-md-4 pl-30 pt-30 pb-30 pr-30">
                    <div class="blog-box">
                        <div class="blog-img">
                            <a href="#">
                                <img src="images/blog1.png" alt="" />
                            </a>
                        </div>
                        <div class="blog-con">
                            <ul class="top-b">
                                <li>Oct 22, 2021</li>
                                <li>Johndy</li>
                            </ul>
                            <h4><a href="#">Cleaning Team Is Ready To Work</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pl-30 pt-30 pb-30 pr-30">
                    <div class="blog-box">
                        <div class="blog-img">
                            <a href="#">
                                <img src="images/blog2.png" alt="" />
                            </a>
                        </div>
                        <div class="blog-con">
                            <ul class="top-b">
                                <li>Oct 22, 2021</li>
                                <li>Johndy</li>
                            </ul>
                            <h4><a href="#">10 Tips Cleaning Your Apartment</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pl-30 pt-30 pb-30 pr-30">
                    <div class="blog-box">
                        <div class="blog-img">
                            <a href="#">
                                <img src="images/blog3.png" alt="" />
                            </a>
                        </div>
                        <div class="blog-con">
                            <ul class="top-b">
                                <li>Oct 22, 2021</li>
                                <li>Johndy</li>
                            </ul>
                            <h4><a href="#">5 Tips Of Hiring Office Cleaners</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div-->


    <!--div class="request-home pt-90 pb-90">
        <div class="container">
            <div class="bg-w-re">
                <div class="row">
                    <div class="col-md-4">
                        <div class="min-bg-or">
                            <div class="cont-one">
                                <h4>Our Location</h4>
                                <p>
                                    AT&T Software LLC, 4500 Mercantile plaza, Suite 300, Fort Worth,
                                    TX, 76137, USA
                                </p>
                            </div>
                            <div class="cont-one">
                                <h4>Quick Contact</h4>
                                <p>
                                    Email: <a href="https://products.webrockmedia.com/cdn-cgi/l/email-protection"
                                        class="__cf_email__"
                                        data-cfemail="523b3c343d12372a333f223e377c313d3f">[email&#160;protected]</a>
                                    <br />
                                    Call: +1 (817) 901 3377
                                </p>
                            </div>
                            <div class="cont-one">
                                <h4>
                                    We will get back to you within
                                    24 hours, or call us everyday,
                                    09:00 AM - 12:00 PM
                                </h4>
                            </div>
                            <div class="cont-one">
                                <a href="#"><span class=""><i class="fa fa-phone"></i></span> +1 (469) 844 4482</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-send pl-30 pr-30">
                            <h3>Demander un devis</h3>
                            <p>
                                Un contrôle complet sur les produits nous permet de garantir à nos clients les meilleurs prix et services de qualité.
                            </p>
                            <form method="post" class="form-re">
                                <div class=" row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="Name" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="Email" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class=" row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="Phone" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="Your Industry" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class=" row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea placeholder="Additional Details!"
                                                class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class=" row">
                                    <div class="col-md-12">
                                        <div class="form-group mt-30 mb-0">
                                            <a href="#" class="btn blue-btn">
                                                Envoyer la demande <i class="fa fa-arrow-right"></i>
                                                <span style="top: 176.578px; left: 137.5px;"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div-->

</div>
@endsection


@section('codeJS')

<script>
    $(function(){
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:5,
            nav:true,
            responsive:{
                0:{
                    items:2
                },
                600:{
                    items:4
                },
                1000:{
                    items:6
                }
            },
            autoplay:true,
            autoplayTimeout:1000,
            autoplayHoverPause:true
        })
    })
</script>
@endsection
