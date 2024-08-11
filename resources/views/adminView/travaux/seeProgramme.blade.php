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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                @if($contrat->boucler == 0)
                <button type="button" class="btn btn-primary">Modifier programmes</button>
                <a onclick="return confirm('Voulez-vous vraiment supprimer ce programmer ?')" href="{{route('admin.travaux.del_programme',$item->id)}}"  class="btn btn-danger">
                    Supprimer Programme
                </a>
                @endif

            </div>
        </div>
    </div>
</div>
