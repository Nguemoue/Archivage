@extends('templates.templateUser.templateUser')

@section('content')
    <div class="container-fluid">
{{--        @livewire("classement-view",['dossierId' => $dossier->id,'classements' => $classements])--}}
		 <h4 class="text-muted">Classement du dossier : {{$dossier->nom}}</h4>
		 <hr>
		 <form action="{{route('classement.dossier.post',[$dossier->id])}}" method="post">
			 @csrf
			 <div class="form-group">
				 <label for="sous_classement_id" class="form-label">Destination du dossier.</label>
				 <select required name="sous_classement_id" class="form-select-lg form-control select2" id="sous_classement_id">
					 @foreach($classements as $classement)
						 <optgroup label="{{$classement->nom}}">
							 @foreach($classement->sousClassements as $item)
								 <option value="{{$item->id}}">{{$item->nom}}</option>
							 @endforeach
						 </optgroup>
					 @endforeach
				 </select>
			 </div>
			 <div class="text-end mt-4">
				 <button type="submit" class="btn btn-dark">Soumettre <i class="ti ti-fold-up"></i></button>
			 </div>
		 </form>
    </div>
@endsection

@push('scripts')
	<script src="{{asset('_materialize_v2/dist/libs/select2/dist/js/select2.min.js')}}"></script>
	<script>
		$(function (){
			$('.select2').select2();
		})
	</script>
@endpush

@push('styles')
	<link rel="stylesheet" href="{{asset('_materialize_v2/dist/libs/select2/dist/css/select2.min.css')}}">

@endpush
