<x-admin-layout>
    <x-slot name="titre">Nouveau Client</x-slot>

    <x-slot name="client_menu"> show</x-slot>
    <x-slot name="client_new">active</x-slot>

    <div class="pagetitle">
        <h1>Nouveau Client</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Accueil</a></li>
                <!--li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Blank</li-->
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Rentrez les informations sur le clients</h5>

                        <!-- Multi Columns Form -->
                        <form class="row g-3" method="post" action="{{route('admin.clients.save_client')}}" >
                            @csrf
                            <div class="col-md-8">
                                <label for="inputName5" class="form-label">Nom & Prénoms du clients ou ( Nom de la société)</label>
                                <input type="text" class="form-control" id="inputName5" name="name" value="{{@old('name')}}" >
                                @error('name')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="inputName5" class="form-label">Type de client</label>
                                <select name="type_client" id="" class="form-control" >
                                    <option value="">Chosir</option>
                                    <option @if(old('type_client') == "Personne Physique") selected @endif  value="Personne Physique">Personne Physique</option>
                                    <option @if(old('type_client') == "Personne Morale") selected @endif  value="Personne Morale">Personne Morale</option>
                                </select>
                                @error('type_client')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail5" class="form-label">Email</label>
                                <input type="email" name="email" value="{{@old('email')}}" class="form-control" id="inputEmail5">
                                @error('email')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress5" class="form-label">Addresse</label>
                                <input type="text" name="adresse" value="{{@old('adresse')}}" class="form-control" id="inputAddres5s" placeholder="1234 Main St">
                                @error('adresse')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress5" class="form-label">Téléphone</label>
                                <input type="text" name="telephone" value="{{@old('telephone')}}" class="form-control" id="inputAddres5s" placeholder="1234 Main St">
                                @error('telephone')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>


                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                <button type="reset" class="btn btn-secondary">Effacer</button>
                            </div>
                        </form><!-- End Multi Columns Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</x-admin-layout>
