<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="contact-btn">
                <h2>
                    Avec wàcló, la propreté <br>
                    n'a plus de secret.
                </h2>
                <a href="{{route('contact')}}" class="btn blue-btn">
                    Nous contactez <i class="fa fa-arrow-right"></i>
                    <span style="top: 176.578px; left: 137.5px;"></span>
                </a>
            </div>
            <div class="contact-btn text-center mt-lg-0 mt-2">
                Vous avez envie de travailler avec ?
                <a style="color:white" class="" href="{{route('job')}}">Envoyez-nous une demande ( cliquez ici ) </a>
            </div>
        </div>
    </div>
</div>
<div class="container pt-50 pb-50">
    <div class="row">
        <div class="col-md-4">
            <div class="footer-cont footer-logo">
                <span class="logo-f mar-top">
                    <a href="#">
                        <img src="images/footer-logo.png" alt="" />
                    </a>
                </span>
                <p>
                    wàcló est une entreprise spécialisée dans les services de nettoyage et d'entretien pour les particuliers et les entreprises.
                </p>
                <!--ul class="social-m-footer">
                    <li><a href="#" class="facebook"><i class="fa fa-facebook-f"></i></a></li>
                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                </ul-->
            </div>
        </div>
        <div class="col-md-4">
            <div class="footer-cont footer-logo mt-20">
                <div class="text-center">
                    <h3>Liens Utiles</h3>
                </div>
                <ul class="menu-footer wi-50">
                    <li><a href="{{route('index')}}">Accueil</a></li>
                    <li><a href="{{route('about')}}">A propos de nous</a></li>
                    <li><a href="{{route('service')}}">Nos services</a></li>
                    <li><a href="{{route('contact')}}">Nos Contacts</a></li>
                    <li><a href="{{route('devis')}}">Demande de devis</a></li>
                    <li> <a href="{{route('job')}}">Travaillez avec nous</a> </li>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <div class="footer-cont footer-logo mt-20">

                <div class="text-center">
                    <h3>Plus d'informations</h3>
                </div>
                <ul class="menu-footer wi-100">
                    <li><span><i class="fa fa-map-marker"></i></span>
                        {{$siteweb->adresse}}
                    </li>
                    <li><span><i class="fa fa-phone"></i></span>{{$siteweb->telephone}}</li>
                    <li>
                        <span><i class="fa fa-envelope-o"></i></span>
                        <a href="mailto:{{$siteweb->email_one}}">{{$siteweb->email_one}}</a>
                        @if(!empty($siteweb->email_deux )) /
                        <a href="mailto:{{$siteweb->email_deux}}">{{$siteweb->email_deux}}</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
        <!--div class="col-md-3">
            <div class="footer-cont footer-logo mt-20">
                <h3>Newsletter</h3>
                <div class="news-f">
                    <input type="text" placeholder="Email" class="fill form-control" />
                    <button><i class="fa fa-envelope"></i></button>
                </div>
                <p>Sign up for our latest news & articles. We won’t give you spam mails.</p>
            </div>
        </div-->
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="copy-one">
                <p>© copyright {{date('Y')}} by <a href="tel:+22961102637">AKM TECH</a>
                </p>
            </div>
        </div>
    </div>
</div>
