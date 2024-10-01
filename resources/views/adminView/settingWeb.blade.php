<x-admin-layout>
    <x-slot name="titre">Paramètres du site web</x-slot>

    <div class="pagetitle">
        <h1>Paramètres du site web</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Accueil</a></li>
                <!--li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Blank</li-->
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body"></h5>

                        <form class="row g-3 pt-2" action="{{route('admin.setting.site_web_update')}}" method="post" >
                            @csrf
                            <div class="col-md-4">
                                <label for="inputName5"   class="form-label">Adresse</label>
                                <input type="text" name="adresse" value="{{@old('adresse',$data->adresse)}}" class="form-control" id="inputName5">
                                @error('adresse')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="inputName5" class="form-label">Téléphone</label>
                                <input type="text"  name="telephone" value="{{@old('telephone',$data->telephone)}}" class="form-control" id="inputName5">
                                @error('telephone')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="inputName5" class="form-label">Email principal</label>
                                <input type="text"  name="email_one" value="{{@old('email_one',$data->email_one)}}" class="form-control" id="inputName5">
                                @error('email_one')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="inputName5" class="form-label">Email secondaire</label>
                                <input type="text"  name="email_deux" value="{{@old('email_deux',$data->email_deux)}}" class="form-control" id="inputName5">
                                @error('email_deux')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="inputName5" class="form-label">Facebook</label>
                                <input type="text"  name="facebook" value="{{@old('facebook',$data->facebook)}}" class="form-control" id="inputName5">
                                @error('facebook')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="inputName5" class="form-label">Twitter</label>
                                <input type="text"  name="twitter" value="{{@old('twitter',$data->twitter)}}" class="form-control" id="inputName5">
                                @error('twitter')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="inputName5" class="form-label">whatsapp</label>
                                <input type="text"  name="whatsapp" value="{{@old('whatsapp',$data->whatsapp)}}" class="form-control" id="inputName5">
                                @error('whatsapp')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="inputName5" class="form-label">TikTok</label>
                                <input type="text"  name="tiktok" value="{{@old('tiktok',$data->tiktok)}}" class="form-control" id="inputName5">
                                @error('tiktok')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="inputName5" class="form-label">Lien Google Maps</label>
                                <input type="text"  name="google_maps" value="{{@old('google_maps',$data->google_maps)}}" class="form-control" id="inputName5">
                                @error('google_maps')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Sauvegarder les changements</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

</x-admin-layout>
