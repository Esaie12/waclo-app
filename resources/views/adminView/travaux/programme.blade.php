<x-admin-layout>
    <x-slot name="titre">Programmes</x-slot>

    <x-slot name="travaux_menu"> show</x-slot>
    <x-slot name="travaux_cours">active</x-slot>

    <div class="pagetitle">
        <h1>Programmes chez le client <span class="text-primary">{{$contrat->name}}</span> </h1>
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
            @if($contrat->boucler == 0)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Programmer un passage </h5>

                        <form class="row g-3" action="{{route('admin.travaux.save_programmes')}}" method="post">
                            @csrf
                            <input type="hidden" name="idContrat" value="{{$idContrat}}">
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Date de Passage</label>
                                <input type="date" value="{{@old('date_passage')}}" min="{{$contrat->date_debut}}" max="{{$contrat->date_fin}}" name="date_passage"
                                    class="form-control" id="inputNanme4">
                                @error('date_passage')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Heure de passsage</label>
                                <input type="time" name="heure_debut" value="{{@old('heure_debut')}}" class="form-control"
                                    id="inputEmail4">
                                @error('heure_debut')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Heure de fin</label>
                                <input type="time" name="heure_fin" value="{{@old('heure_fin')}}" class="form-control"
                                    id="inputEmail4">
                                @error('heure_fin')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Les agents</label>
                                <select name="employes[]" class="form-select" multiple=""
                                    aria-label="multiple select example">
                                    @foreach ($les_employes as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('employes')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                <button type="reset" class="btn btn-secondary">Effacer</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            @else
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Vous ne pouvez plus faire des programmations de passage. Car le contrat a été deja bouclé.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif

            @if(count($programmes)> 0)
                @php if($contrat->boucler == 1){ $col=12; }else{ $col = 8; } @endphp
                <div class="col-md-{{$col}}">


                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Les programmes établient</h5>

                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Date Passage</th>
                                    <th scope="col">Arrivée</th>
                                    <th scope="col">Départ</th>
                                    <th scope="col">Statut</th>
                                    <th scope="col" class="text-center" >Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($programmes as $key=> $item)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$item->date_passage}}</td>
                                    <td>{{$item->heure_debut}}</td>
                                    <td>{{$item->heure_fin}}</td>
                                    <td>
                                        @if($item->effectuer == 1)
                                        <span class="badge bg-success">Nettoyage effectué</span>
                                        @else
                                        <span class="badge bg-warning">En attente</span>
                                        @endif
                                    </td>
                                    <td>

                                        <div class="btn-group">
                                            <!--a onclick="return confirm('Voulez vous vraiment le faire ?') " href="{{route("admin.travaux.confirm_programmes",$item->id)}}" class="btn btn-success">Confirmer le nettoyage</a-->

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="{{'#basicModal'.$item->id}}">
                                                Voir agents
                                            </button>
                                        </div>

                                        @include('adminView.travaux.seeProgramme')

                                        @if($item->effectuer == 1)
                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="{{'#basicModal'.$item->id}}">
                                            Commentaire
                                        </button>
                                        @else
                                        <a onclick="return confirm('Voulez vous vraiment le faire ?') " href="{{route("admin.travaux.annuler_programmes",$item->id)}}" class="btn btn-danger">Annuler Passage</a>
                                        @endif

                                    </td>
                                </tr>



                                @endforeach

                            </tbody>
                        </table>
                        <!-- End small tables -->

                    </div>
                </div>
                @else
                <div class="col-md-8">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        Aucun programme n'a encore été établit pour ce contrat.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>

                @endif


            </div>
        </div>
    </section>

</x-admin-layout>
