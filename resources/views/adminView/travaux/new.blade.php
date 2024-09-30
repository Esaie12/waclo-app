
<x-admin-layout>
    <x-slot name="titre">Nouveau contrat</x-slot>

    <x-slot name="travaux_menu"> show</x-slot>
    <x-slot name="travaux_new">active</x-slot>

    <div class="pagetitle">
        <h1>Nouveau contrat de travail</h1>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Je viens d'avoir un nouveau contrat </h5>

                        <!-- Multi Columns Form -->
                        <form class="row g-3" method="post" action="{{route('admin.travaux.save_new')}}" enctype="multipart/form-data" >
                            @csrf
                            <div class="col-md-4">
                                <label for="inputState" class="form-label">Selectionner le client</label>
                                <select name="client" id="inputState" class="form-select" required >
                                    <option value="" >Choisir client</option>
                                    @foreach ($les_clients as $item)
                                    <option @if(old('client') == $item->id) selected @endif value="{{$item->id}}" >{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('client')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="inputName5" class="form-label">Date de début de travail</label>
                                <input name="date_debut" value="{{@old('date_debut')}}" type="date" class="form-control" id="inputName5">
                                @error('date_debut')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="inputEmail5" class="form-label">Date de fin de travail</label>
                                <input type="date" name="date_fin" value="{{@old('date_fin')}}" class="form-control" id="inputEmail5">
                                @error('date_fin')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="inputPassword5" class="form-label">Fréquence de passsage</label>
                                <input type="number" name="frequence" value="{{@old('frequence',1)}}" class="form-control" id="inputPassword5">
                                @error('frequence')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="inputState" class="form-label">Modalité de passage</label>
                                <select name="modalite" id="inputState" class="form-select" required >
                                    <option value="Jours" @if(old('modalite') == "Jours") selected @endif >Jours</option>
                                    <option value="Semaine" @if((old('modalite') == "Jours") or old('modalite') == "" ) selected @endif  >Semaine</option>
                                    <option value="Mois" @if(old('modalite') == "Mois") selected @endif >Mois</option>
                                </select>
                                @error('modalite')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="inputPassword5" class="form-label">Contrat de travail</label>
                                <input type="file" name="fichier_contrat" class="form-control" id="inputPassword5">
                                @error('fichier_contrat')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <!--div class="col-md-3">
                                <label for="inputPassword5" class="form-label">Montant</label>
                                <input type="number" class="form-control" id="inputPassword5">
                            </div-->

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                <button type="reset" class="btn btn-secondary">Effacer</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

</x-admin-layout>

