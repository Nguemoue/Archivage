@extends('template')

@section('content')

	<div class="float-right">
		<a href="#" class="btn btn-outline-info btn-sm btn-download" id="download"><i class="fa fa-download"></i>
			telecharger</a>
	</div>
	<div class="container-fluid">
		<h2 class="text-center">Filtre pour Les Statistique</h2>
	</div>
	<hr>
	<section id="print-chart">
		<div class="card card-border-primary">
			<div class="card-header">
				Statistiaques des Documents
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
					<tr>
						<th>#</th>
						<th>Sous Type</th>
						<th>Type</th>
						<th>Date de creation</th>
						@foreach($champTab as $c)
							<th>{{Str::ucfirst($c)}}</th>
						@endforeach
					</tr>
					</thead>
					<tbody>
					@foreach($documents as $document)
						<tr>
							<td>{{$loop->index + 1}}</td>
							<td>{{$document->sous_type_document->nom}}</td>
							<td>{{$document->sous_type_document->type->nom}}</td>
							<td>{{$document->created_at->isoFormat("lll")}}</td>
							@foreach($champTab as $c)
								<th>{{$document->data[$c]}}</th>
							@endforeach
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
			<div class="card-footer">
				@if(in_array("montant",$champTab))
					<div class="shadow">
						<h5 colspan="{{4+count($champTab)}}">
							Total : {{$documents->sum(function ($item) use($champ){
     										return (int) $item->data[$champ];
											})  }}
						</h5>
					</div>
				@endif
			</div>
		</div>
		<div class="chart" >
			<hr>
			<div class="">
				<livewire:livewire-column-chart :column-chart-model="$lineChart"/>
			</div>
			<hr class="my-4">
			<div>
				<livewire:livewire-pie-chart :pie-chart-model="$pieChart"/>
			</div>
			<div>
				<livewire:livewire-line-chart :line-chart-model="$histogrameChart"/>
			</div>

		</div>
	</section>
@endsection
@push("styles")
	@livewireChartsScripts
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endpush

@push("scripts")
	<script src="{{ mix('js/app.js') }}"></script>
	<script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.7/dist/html2canvas.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jspdf-html2canvas@latest/dist/jspdf-html2canvas.min.js"></script>
	<script>
		$('#download').on('click', function () {
			html2PDF(document.getElementById("print-chart"), {
				jsPDF: {
					format: 'a4',
				},
				imageType: 'image/jpeg',
				output: './pdf/generate.pdf'
			});
		});
	</script>
@endpush
