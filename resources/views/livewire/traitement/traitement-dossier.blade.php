<div class="card p-2">
    @foreach ($dossier->tempDocuments as $item)
        <div class="border my-2 p-2 ">
            <img src="{{ asset('icones/fichier.jpg') }}" alt="icone fichier" class="img-fluid" width="30" />
            <span>{{ $item->numero }}</span>
            <a href="#" class="float-right border p-2 btn btn-secondary">traiter ce fichier</a>
        </div>
    @endforeach
</div>
