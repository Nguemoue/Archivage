@section("content")
    <div class="card">
        <ul class="list-group">
            @foreach ($fichiers as $fich)
                <li class="list-group-item p-2" style="cursor: pointer">
                    <img src="{{ asset('storage/'.$fich->url) }}" width="100" alt="fichier">
                    fichier numero {{ $fich->numero }}
                </li>
            @endforeach
        </ul>
    </div>
    @livewire('scann.scann-element')
@endsection
