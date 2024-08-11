@extends('layout.template')
@section('titre', 'Contact')

@section('contenu')

<div class="sub-banner pt-80 pb-80">
    <div class="container">
        <div class="col-md-8  offset-md-2">
            <div class="text-center text-line">
                <h1>Contactez-nous</h1>
                <ul class="text-c">
                    <li><a href="{{route('index')}}">Accueil</a></li>
                    <li>|</li>
                    <li class="color-t"> Contactez-nous</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="Blog-section contact-us-page pt-90 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="left-side-add">
                    <div class="cont-add mb-40">
                        <h3>Pour nous contactez</h3>
                        <p>Si vous avez des questions, utilisez simplement les coordonnées suivantes.</p>
                    </div>
                    <div class="add-li">
                        <span>
                            <i class="fa fa-map-marker"></i>
                        </span>
                        <div class="right-add">
                            <h4>Adresse</h4>
                            <p>
                                {{$siteweb->adresse}}
                            </p>
                        </div>
                    </div>
                    <div class="add-li">
                        <span>
                            <i class="fa fa-envelope-o"></i>
                        </span>
                        <div class="right-add">
                            <h4>Emails</h4>
                            <p>
                                <a href="mailto:{{$siteweb->email_one}}">{{$siteweb->email_one}}</a> <br>
                                <a href="mailto:{{$siteweb->email_deux}}">{{$siteweb->email_deux}}</a>
                            </p>
                        </div>
                    </div>
                    <div class="add-li">
                        <span>
                            <i class="fa fa-phone"></i>
                        </span>
                        <div class="right-add">
                            <h4>Télephone</h4>
                            <p>
                                {{$siteweb->telephone}}
                            </p>
                        </div>
                    </div>
                    <div class="add-li social-con">
                        <ul class="social-t">
                            @if(!empty($siteweb->facebook))
                            <li><a href="{{$siteweb->facebook}}" target="__blank"  class="facebook-change-co"><i class="fa fa-facebook-f"></i></a></li>
                            @endif
                            @if(!empty($siteweb->twitter))
                            <li><a href="{{$siteweb->twitter}}" target="__blank"  class="twitter-change-co"><i class="fa fa-twitter"></i></a></li>
                            @endif
                            @if(!empty($siteweb->tiktok))
                            <li><a href="{{$siteweb->tiktok}}"  target="__blank" class="linkedin-change-co"><i class="fa fa-linkedin"></i></a></li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="light-sky">
                    <div class="cont-add black-t mb-30">
                        <h3>Envoyez-nous un message</h3>
                    </div>
                    <div class="form-send">
                        <div id="resultmm">
                            @if(Session::get('msg'))
                            <span class="seccess">Email envoyé. Merci, nous vous contacterons sous peu.</span>
                            @endif
                        </div>
                        <form id="my-form" action="{{route('send_msg')}}"  method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" placeholder="Nom & Prénoms" name="first_name" required=""
                                    class="form-control form-com" required>
                            </div>
                            <div class="form-group">
                                <input type="email" placeholder="Email" name="email" required=""
                                    class="form-control form-com" required >
                            </div>
                            <div class="form-group">
                                <input type="number" maxlength="10" placeholder="Numéro de Téléphone" name="phone"
                                    required="" class="form-control form-com" required >
                            </div>
                            <div class="form-group">
                                <textarea placeholder="Message" name="message"
                                    class="form-control form-com-message " required ></textarea>
                            </div>
                            <div class="view-all">
                                <button class="btn upcase" type="submit" name="submit">
                                    Envoyer le message <i class="fa fa-arrow-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="light-sky">
                    <div class="cont-add black-t mb-30">
                        <h3>Localisation</h3>
                    </div>
                    <div class="locateus">
                        <iframe
                            src="{{$siteweb->google_maps}}"
                            width="100%" height="418" style="border:0;" allowfullscreen=""
                            loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
