@extends('template')

@section('content')
    <div class="">
        {{-- bloc pour les documents --}}
        {{-- <div class="col-12">
            <div class="card" style="min-height: 70vh;height:70vh;overflow-y:scroll">
                <div class="card-header">
                    <h4>Les Documents Scanne le {{ now()->Isoformat('D/M/Y') }}</h4>
                    <div class="d-flex justify-content-between align-items-end">
                        <input type="text" class="form-control" placeholder="rechercher">
                        <button type="submit" class="btn btn-sm btn-primary">rechercher</button>
                    </div>
                </div>
                <div class="card-body">
                    @forelse ($temp_documents as $item)
                        <div class="my-2">
                            <div class="d-flex border justify-content-between  p-3 shadow" style="border:1px solid white">
                                <img src="{{ asset('icones/fichier.jpg') }}" alt="" class="img-fluid"
                                    width="40">
                                <span>{{ $item->numero }}</span>
                                <a href="{{ route('traitement.document.show', ['id' => $item->id]) }}"
                                    class="btn btn-secondary btn-sm">Traiter</a>
                                <a href="" class="btn border btn-sm" title="voir de document"><span
                                        class="fa fa-eye"></span></a>
                            </div>
                            <span
                                class="badge p-1 text-light rounded bg-dark">{{ $item->created_at->IsoFormat('lll') }}</span>
                        </div>
                    @empty
                        <div class="alert alert-warning">Auccun Document Scanner</div>
                    @endforelse
                </div>
            </div>
        </div> --}}
        <h4 class="text-center mb-2">Les Dossiers</h4>
        <hr>
        <div class="row">
            @forelse ($temp_dossiers as $key=>$temp)
                <div class="col-6">
                    <div class="card" style="min-height: 70vh;height:70vh;overflow-y:scroll">
                        <div class="card-header">
                            <h4>Scan du {{ $key }}</h4>
                            <div class="d-flex justify-content-between align-items-end">
                                <input type="text" class="form-control" placeholder="rechercher">
                                <button type="submit" class="btn btn-sm btn-primary">rechercher</button>
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach ($temp as $item)
                                <div class="my-2">
                                    <div class="d-flex border justify-content-between  p-3 shadow"
                                        style="border:1px solid white">
                                        <img src="{{ asset('icones/dossier.png') }}" alt="" class="img-fluid"
                                            width="40">
                                        <span>{{ $item->nom }}</span>
                                        <a href="{{ route('traitement.dossier.show', ['id' => $item->id]) }}"
                                            class="btn btn-secondary btn-sm">traitement partielle</a>
                                        <a href="#!" data-bs-toggle="collapse"
                                            data-bs-target="#collapseDossier{{ $item->id }}" class="btn border btn-sm"
                                            title="voir de document">
                                            <span class="fa fa-arrow-circle-down"></span></a>
                                    </div>
                                    <span class="badge p-1 text-light rounded bg-dark">{{ $item->created_at->format('h\h:i a') }}</span> 
                                    <span class="border badge rounded p-1 mt-1">{{ $item->tempDocuments->count() }}
                                        fichiers</span>
                                    <div class="collapse" id="collapseDossier{{ $item->id }}">
                                        <div class="border p-2">
                                            @foreach ($item->tempDocuments as $doc)
                                                @php
                                                    $url = $doc->url;
                                                    // dump($url);
                                                    $part = explode('.', $url);
                                                    $ext = end($part);
                                                @endphp
                                                <div class="border mx-2 my-2">
                                                    <div class="d-flex border justify-content-between"
                                                        style="border:1px solid white">
                                                        <img src="{{ asset('icones/' . ($ext == 'pdf' ? 'pdf' : 'img') . '.png') }}"
                                                            alt="" class="img-fluid" width="30">
                                                        <span>{{ '[' . Str::substr($doc->numero, 0, 14) . '...]' }}.{{ $ext }}</span>
                                                        <a href="{{ route('file.preview',['id'=>$doc->id]) }}" class="btn border btn-sm"
                                                            title="voir de document"><span class="fa fa-eye"></span></a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-warning">Aucun dossier sacnner</div>
            @endforelse
        </div>
    </div>
@endsection
