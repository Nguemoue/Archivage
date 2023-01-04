<div class="card p-2">
    @foreach ($dossier->tempDocuments as $item)
        <div class="border my-2 p-2 ">
            <img src="{{ asset('icones/'.($item->ext=="pdf"?'pdf':'img' ).'.png') }}" alt="icone fichier" class="img-fluid" width="30" />
            <span>{{ $item->numero }}</span>
            <a href="{{ route('traitement.document.show',['id'=>$item->id]) }}"  class="float-right border p-2 btn btn-secondary">traiter ce fichier</a>
        </div>
    @endforeach
</div>
