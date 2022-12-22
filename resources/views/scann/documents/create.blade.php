@extends("template")

@section("content")
<a href="{{ route('scan.index') }}" class="btn btn-success">retour</a>
    <h2 class="text-center my-4">Scann Des Documents</h2>
    <hr>
    <div class="card">
        <div class="card-header">Formulaire de scann</div>
        <div class="card-body">
            @includeIf("_partials.errors")
            @includeIf("_partials.swal")
            <form action="{{ route('scann.document.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="titre" class="form-label">Titre du document</label>
                    <input type="text" class="form-control" placeholder="Titre du document" name="titre">
                </div>
                <div class="mb-3">
                    <label for="url" class="btn btn-block btn-dark p-2">Choisissez le document</label>
                    <input type="file" class="d-none" id="url" name="url" accept="application/pdf,image/*"/>
                </div>
                <button type="submit" class="btn btn-primary p-2">transferer</button>
            </form>
        </div>
    </div>
@endsection