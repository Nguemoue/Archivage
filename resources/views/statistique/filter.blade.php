@extends('template')

@section('content')
    <div class="container-fluid">
        <h2 class="text-center">Filtre pour Les Statistique</h2>
        <hr>
        <div class="card">
            <div class="card-footer">
                Formulaire de PreStatistique
            </div>
            <hr>

            <div class="card-body">
                <form action="{{route('statistique.home')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="periode">Choisissez la periode</label>
                        <select name="periode" class="form-control border" id="periode">
                            <option value="jour">jour</option>
                            <option value="jour">mois</option>
                            <option value="jour">annees</option>
                        </select>
                    </div>
                    <div>
                        <label for="sousType">Selectionner le Document Contextuele Rattacher</label>
                        <select name="sousType" id="sousType" class="form-control border">
                            <option value=""  selected >selectionner un element</option>
                            @foreach($sousTypes as $sousType)
                                <option value="{{$sousType->id}}">{{$sousType->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="my-2">
                        <label for="champ">champ</label>
                        <select name="champ" class="form-control border" id="champ">
                        </select>
                    </div>
                    <div class="my-2">
                        <label for="champ">Type de donnees du champ</label>
                        <select name="type" class="form-control border" id="type">
                            <option value="int">Nombre</option>
                            <option value="string">texte</option>
                        </select>
                    </div>
                    <hr class="my-4">
						 <div class="my-2">
							 <label for="champTab">champ pour le tableau de statistique</label>
							 <div id="chamTab">

							 </div>
						 </div>
                    <button class="btn btn-success btn-sm">
                        soumettre <i class="fa fa-send"></i>
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="{{ mix('js/app.js') }}"></script>

    <script >
        console.log($)
        $("#sousType").on('change',function (event){
            $.get(`/api/sousType/${event.target.value}/fields`).done(function (data){
               let html = '';
               let champTab = '';
                data.forEach(elt=>{
                   html+=`<option value="${elt}">${elt}</option>`;
                   champTab+=`<label for="${elt}" class="mx-4">
						${elt} <input type="checkbox" id="${elt}" value="${elt}" name="champTab[]">
					</label>`;
               })
                $('#champ').html(html)
					$("#chamTab").html(champTab)
            });
        })
    </script>
@endpush

