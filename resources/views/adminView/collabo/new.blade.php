<x-admin-layout>
    <x-slot name="titre">Enregistrer un collaborateur</x-slot>
    <x-slot name="admin_menu"> show</x-slot>
    <x-slot name="admin_new">active</x-slot>

    <div class="pagetitle">
        <h1>Enregistrer un collaborateur</h1>
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
                        <h5 class="card-title">Remplissez le formulaire suivant</h5>

                        <!-- Multi Columns Form -->
                        <form class="row g-3" action="{{route('admin.collabo.save_collabo')}}" method="post" >
                            @csrf
                            <div class="col-md-6">
                                <label for="inputName5" class="form-label">Nom </label>
                                <input type="text" name="name" value="{{@old('name')}}" class="form-control" id="inputName5">
                                @error('name')
                                    <strong class="text-danger" >{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputName5" class="form-label"> Prénoms</label>
                                <input type="text" name="firstname" value="{{@old('firstname',$data->firstname)}}" class="form-control" id="inputName5">
                                @error('firstname')
                                    <strong class="text-danger" >{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputName5" class="form-label">Email</label>
                                <input type="text" name="email" value="{{@old('email')}}" class="form-control" id="inputName5">
                                @error('email')
                                    <strong class="text-danger" >{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="inputName5" class="form-label">Téléphone</label>
                                <input type="text" name="telephone" value="{{@old('telephone')}}" class="form-control" id="inputName5">
                                @error('telephone')
                                    <strong class="text-danger" >{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="inputName5" class="form-label">Adresse</label>
                                <input type="text"  name="adresse" value="{{@old('adresse')}}" class="form-control" id="inputName5">
                                @error('adresse')
                                    <strong class="text-danger" >{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="inputName5" class="form-label">Recevoir des mails</label>
                                <select name="receve_mail" id="" class="form-control">
                                    <option value="">Faites un choix</option>
                                    <option value="1">Oui</option>
                                    <option value="0">Non</option>
                                </select>
                                @error('receve_mail')
                                    <strong class="text-danger" >Faites un choix</strong>
                                @enderror
                            </div>


                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Enregistrer l'administrateur</button>
                                <button type="reset" class="btn btn-secondary">Effacer</button>
                            </div>
                        </form><!-- End Multi Columns Form -->

                    </div>
                </div>

            </div>

        </div>
    </section>

</x-admin-layout>
