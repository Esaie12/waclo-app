@extends('layout.template')

@section('titre', 'A propos de nous')

@section('contenu')

<div class="sub-banner pt-80 pb-80">
    <div class="container">
        <div class="col-md-8  offset-md-2">
            <div class="text-center text-line">
                <h1>A propos de nous</h1>
                <ul class="text-c">
                    <li><a href="{{route('index')}}">Accueil</a></li>
                    <li>|</li>
                    <li class="color-t"> A propos de nous</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="about pt-90 pb-90">
    <div class="container">
        <div class="row">
            <!--div class="col-md-4">
                <div class="images-about before-ani after-ani">
                    <img src="{{asset('assets/images/about-images.png')}}" alt="" />
                </div>
            </div-->
            <div class="col-md-12 pt-30 pl-60 pr-30 pd-m-to">
                <div class="right-text">
                    <h4 class="upcase linetext pl-70">À PROPOS DE wàcló</h4>
                    <h5>
                        wàcló est une entreprise spécialisée dans les services de nettoyage et d'entretien pour les particuliers et les entreprises.
                    </h5>
                    <p class="my-3" >
                        Dans le but de répondre aux besoins des entreprises et commerces en matière de nettoyage de locaux, notre société de nettoyage de bureaux vous garantit un nettoyage complet et efficace de votre lieu de travail. Notre offre de nettoyage de bureaux est centrée sur les besoins en constante évolution des PME et Grandes entreprises locales pour le nettoyage de leurs locaux professionnels. Spécialiste du nettoyage en entreprise, notre gamme de prestation s'adresse aux bureaux, surfaces commerciales, hôtellerie et restauration, copropriétés.
                    </p>
                    <h5>
                        En faisant appel aux services de notre entreprise de nettoyage de locaux, vous profitez d’avantages intéressants :
                    </h5>
                    <div class="company-aim">
                        <div class="com-one">
                            <div class="right-side-text be-l">
                                <p>
                                    D’une entreprise de nettoyage sérieuse, compétente et responsable favorisant le travail à long terme, le professionnalisme et la formation de ses équipes, la mise en place d’un cahier des charges sur mesure pour ses clients, mais également l’usage de produits d’entretien professionnels respectueux de la planète
                                </p>
                            </div>
                        </div>
                        <div class="com-one">
                            <div class="right-side-text be-l">
                                <p>
                                    D’une offre sans ou avec engagement
                                </p>
                            </div>
                        </div>
                        <div class="com-one">
                            <div class="right-side-text be-l">
                                <p>
                                    D’une prestation sur mesure répondant parfaitement à vos besoins et à votre budget. Notre société de nettoyage de bureau s’adapte à chaque client en lui proposant une formule qui lui correspond.
                                </p>
                            </div>
                        </div>
                        <div class="com-one">
                            <div class="right-side-text be-l">
                                <p>
                                    D’un responsable de site et d’intervenants dédiés pour un nettoyage de vos locaux de qualité.
                                </p>
                            </div>
                        </div>
                        <div class="com-one">
                            <div class="right-side-text be-l">
                                <p>
                                    D’une prestation de qualité contrôlée et maîtrisée pour une entière satisfaction.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="Testimonials ourmvv pt-90 pb-130">
    <div class="container">
        <div class="row">
            <div class="col-md-11 mar-auto">
                <div class="video-bg mt-60">
                    <div class="img-video">
                        <img src="{{asset('assets/images/video-bg.png')}}" alt="" />
                    </div>
                    <div class="po-box-mvv row">
                        <div class="col-md-4">
                            <div class="box-con">
                                <span class="img-b">
                                    <img src="{{asset('assets/images/mission.png')}}" alt="" />
                                </span>
                                <span class="num">1</span>
                                <div class="dis-con mt-20">
                                    <h3>QUALITE </h3>
                                    <p>
                                        Nous maîtrisons la qualité de nos prestations. <br>
                                        Sérieux, Constance & Efficacité sont les priorités de notre société de nettoyage de bureau
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-con">
                                <span class="img-b">
                                    <img src="{{asset('assets/images/vision.png')}}" alt="" />
                                </span>
                                <span class="num">2</span>
                                <div class="dis-con mt-20">
                                    <h3>INNOVATION </h3>
                                    <p>
                                        Notre comité innovation s'engage à vous proposer des services toujours plus innovants.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-con">
                                <span class="img-b">
                                    <img src="{{asset('assets/images/value.png')}}" alt="" />
                                </span>
                                <span class="num">3</span>
                                <div class="dis-con mt-20">
                                    <h3>ENVIRONNEMENT </h3>
                                    <p>
                                        Les enjeux environnementaux et sociaux font partie intégrante de notre stratégie globale.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--div class="Director pt-90 pb-40">
    <div class="container">
        <div class="row">
            <div class="col-md-3  offset-md-1">
                <div class="img-dir before-ani">
                    <img src="images/direct.png" alt="">
                </div>
            </div>
            <div class="col-md-8 pt-0 pl-60 pr-30">
                <div class="right-text Director-con">
                    <h4 class="upcase linetext pl-70">director’s message</h4>
                    <h2>
                        We are Proud to be Lead Bys
                    </h2>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        has been the industry's standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make a type specimen book.
                        <br /> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make a type specimen book.
                    </p>
                    <b><i>A Warm Welcome to the New Look Group Of Company.</i></b>
                    <div class="sign">
                        <img src="images/sig.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div-->


<!--div class="Testimonials pt-90 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-t">
                    <h2>Nos témoignages</h2>
                    <p>
                        Nos premiers clients témoignent deja.
                    </p>
                </div>
            </div>
        </div>
        <div class="row pt-40 pl-20 pr-20">
            <div id="owl-demo2" class="owl-demo2 owl-carousel owl-theme">
                <div class="item">
                    <div class="testmonial-box testmonial-box-two">
                        <div class="left-i">
                            <span class="img-user">
                                <img src="{{asset('assets/images/tw3.png')}}" alt="" />
                            </span>
                        </div>
                        <div class="right-side">
                            <div class="right-t">
                                <h4>Marvin Kinney</h4>
                                <p>CEO Cleany</p>
                                <ul class="test-rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                            <div class="dis-test">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the
                                    1500s, when</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testmonial-box testmonial-box-two">
                        <div class="left-i">
                            <span class="img-user">
                                <img src="{{asset('assets/images/tw3.png')}}" alt="" />
                            </span>
                        </div>
                        <div class="right-side">
                            <div class="right-t">
                                <h4>Marvin Kinney</h4>
                                <p>Cleany Manager</p>
                                <ul class="test-rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                            <div class="dis-test">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the
                                    1500s, when</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testmonial-box testmonial-box-two">
                        <div class="left-i">
                            <span class="img-user">
                                <img src="{{asset('assets/images/tw3.png')}}" alt="" />
                            </span>
                        </div>
                        <div class="right-side">
                            <div class="right-t">
                                <h4>Marvin Kinney</h4>
                                <p>Cleany Marketer</p>
                                <ul class="test-rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                            <div class="dis-test">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the
                                    1500s, when</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div-->


<div class="faq howitwork pt-90 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="right-text">
                    <h4 class="upcase linetext pl-70">FAQ</h4>
                    <h2>
                        Foire aux questions
                    </h2>
                    <p>
                        Vous avez des inquiétudes ? Retrouvez ici les questions les plus récurrentes chez nous
                    </p>
                    <div class="faq-section mt-30">
                        <div class="set">
                            <a href="javascript:void(0)">
                                Pourquoi occuper le nettoyage de ses locaux aux spécialites ?
                                <i class="fa fa-plus"></i>
                            </a>
                            <div class="content">
                                <p>
                                    Il est important d'occuper le nettoyage de ses locaux à des professionnels qualifiés car cela garantit un environnement de travail propre, sain et sûr pour les employés et les visiteurs. Les professionnels du nettoyage disposent des compétences, des outils et des produits nécessaires pour effectuer un nettoyage en profondeur et efficace, tout en évitant les risques de contamination et de propagation de maladies. Cela permet également aux employés de se concentrer sur leur travail sans avoir à se soucier du nettoyage et de la maintenance des locaux.
                                </p>
                            </div>
                        </div>
                        <div class="set">
                            <a href="javascript:void(0)">
                                wàcló est elle reconnue par l’etat et respecte t-elle les règles environnmentales ?
                                <i class="fa fa-plus"></i>
                            </a>
                            <div class="content">
                                <p>
                                    Chez wàcló, nous prenons très au sérieux notre responsabilité envers l'environnement et la société. Nous nous engageons à respecter toutes les règles et réglementations établies par les autorités publiques pour assurer la sécurité et la santé de nos employés et de nos clients.

                                    Nous sommes également conscients de l'impact environnemental de nos activités et nous nous efforçons de minimiser notre empreinte écologique en utilisant des produits de nettoyage respectueux de l'environnement et en adoptant des pratiques durables dans notre gestion des déchets. Nous nous engageons également à sensibiliser nos employés et nos clients à l'importance de la durabilité environnementale et à promouvoir des pratiques respectueuses de l'environnement dans toutes nos activités. Chez wàcló, nous sommes fiers de contribuer à un avenir plus propre et plus durable pour tous.
                                </p>
                            </div>
                        </div>
                        <div class="set">
                            <a href="javascript:void(0)">
                                wàcló offre t'elle des services chers ?
                                <i class="fa fa-plus"></i>
                            </a>
                            <div class="content">
                                <p>
                                    Chez wàcló, nous sommes fiers de proposer des services de nettoyage de haute qualité à des prix abordables pour répondre aux besoins de nos clients béninois. Nous comprenons que chaque client a des besoins différents, c'est pourquoi nous offrons des services personnalisés pour s'adapter à chaque budget.

                                    Notre objectif est de fournir un service de qualité supérieure à un coût raisonnable. Nous sommes convaincus que notre engagement envers la qualité et l'efficacité nous permet de proposer des prix concurrentiels sur le marché du nettoyage au Bénin. Chez wàcló, nous sommes déterminés à offrir des services de nettoyage professionnels et abordables pour aider nos clients à maintenir des espaces de vie et de travail propres et sains.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4  offset-md-1">
                <div class="img-faq before-ani">
                    <img src="{{asset('assets/ia/boy2.jpg')}}" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>


<!--div class="Team Blog-section pt-90 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-t">
                    <h2>A Look At Our Team</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipiscing
                    </p>
                </div>
            </div>
        </div>
        <div class="row pt-40">
            <div id="owl-demo5" class="owl-demo5 owl-carousel owl-theme">
                <div class="item">
                    <div class="team-m">
                        <span class="t-img">
                            <img src="images/t1.png" alt="" />
                        </span>
                        <div class="n-d">
                            <h3>Jackson Nash</h3>
                            <p>Cleany Marketer</p>
                            <ul class="social-t">
                                <li><a href="#" class="facebook-change-co"><i class="fa fa-facebook-f"></i></a>
                                </li>
                                <li><a href="#" class="twitter-change-co"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="pinterest-change-co"><i class="fa fa-pinterest"></i></a>
                                </li>
                                <li><a href="#" class="linkedin-change-co"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="team-m">
                        <span class="t-img">
                            <img src="images/t2.png" alt="" />
                        </span>
                        <div class="n-d">
                            <h3>Ollie Schneider</h3>
                            <p>CEO Cleany</p>
                            <ul class="social-t">
                                <li><a href="#" class="facebook-change-co"><i class="fa fa-facebook-f"></i></a>
                                </li>
                                <li><a href="#" class="twitter-change-co"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="pinterest-change-co"><i class="fa fa-pinterest"></i></a>
                                </li>
                                <li><a href="#" class="linkedin-change-co"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="team-m">
                        <span class="t-img">
                            <img src="images/t3.png" alt="" />
                        </span>
                        <div class="n-d">
                            <h3>Nashid Martines</h3>
                            <p>Cleany Manager</p>
                            <ul class="social-t">
                                <li><a href="#" class="facebook-change-co"><i class="fa fa-facebook-f"></i></a>
                                </li>
                                <li><a href="#" class="twitter-change-co"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="pinterest-change-co"><i class="fa fa-pinterest"></i></a>
                                </li>
                                <li><a href="#" class="linkedin-change-co"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="team-m">
                        <span class="t-img">
                            <img src="images/t4.png" alt="" />
                        </span>
                        <div class="n-d">
                            <h3>Konne Backfield</h3>
                            <p>Office Cleaner</p>
                            <ul class="social-t">
                                <li><a href="#" class="facebook-change-co"><i class="fa fa-facebook-f"></i></a>
                                </li>
                                <li><a href="#" class="twitter-change-co"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="pinterest-change-co"><i class="fa fa-pinterest"></i></a>
                                </li>
                                <li><a href="#" class="linkedin-change-co"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="team-m">
                        <span class="t-img">
                            <img src="images/t2.png" alt="" />
                        </span>
                        <div class="n-d">
                            <h3>Ollie Schneider</h3>
                            <p>Cleany Manager</p>
                            <ul class="social-t">
                                <li><a href="#" class="facebook-change-co"><i class="fa fa-facebook-f"></i></a>
                                </li>
                                <li><a href="#" class="twitter-change-co"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="pinterest-change-co"><i class="fa fa-pinterest"></i></a>
                                </li>
                                <li><a href="#" class="linkedin-change-co"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div-->

@endsection
