<div class="modal fade" id="{{'basicModal'.$item->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Programmes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @php
                $tab = json_decode( $item->employes, true );
                @endphp

                <ul>
                    @foreach ($tab as $item2)
                        <li>{{  $item2}}</li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="{{'confirmPassage'.$item->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
    <form action="{{route('programmes.confirm',$item->id)}}" method="POST">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content"  >
                <div class="modal-header">
                    <h5 class="modal-title">Confirmer le passage des agents d'entretien</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @php
                    $tab = json_decode( $item->employes, true );
                    @endphp

                    <ul>
                        @foreach ($tab as $item2)
                            <li>{{  $item2}}</li>
                        @endforeach
                    </ul>

                    @if($item->date_passage <= date('Y-m-d') and $item->effectuer == 0)
                    <textarea placeholder="Vous avez des commentaires ou des remarques à faire, par rapport au passage de nos agents ? Ecrivez le ici." name="remarques" id="" class="form-control" cols="30" rows="5"></textarea>
                    @endif


                </div>
                <div class="modal-footer">
                    @if($item->date_passage <= date('Y-m-d') and $item->effectuer == 0)
                    <button type="submit" class="btn btn-success">Confimer le passage</button>
                    @endif

                    @if($item->date_passage > date('Y-m-d'))
                    <div class="alert alert-danger" role="alert">
                       Vous ne pouvez pas confirmer ce programme car la date de passage n'est pas arrivée.
                    </div>
                    @endif

                    @if($item->effectuer ==1)
                    <div class="alert alert-info" role="alert">
                        @if($item->remarques)
                        {{$item->remarques}}
                        @else
                        Vous n'avez laisser aucun commentaire
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>
