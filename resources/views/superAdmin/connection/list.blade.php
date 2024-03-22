@extends("templates.templateSuperAdmin.templateSuperAdmin")

@section("content")
	<h5 class="text-center my-3">
		Listes des connections Effectué sur la plateforme
	</h5>

	<div class="card">

	</div>

	<table class="datatable table table-bordered">
		<thead>
		<tr>
			<th>#</th>
			<th>Appareil</th>
			<th>Utilisateur</th>
			<th>Groupe</th>
			<th>Addresse Ip</th>
			<th>Date de connexion</th>
			<th>Actions</th>
		</tr>
		</thead>
		<tbody>
		@foreach($connections as $connection)
			<tr>
				<td>{{$loop->index + 1}}</td>
				<td>{{$connection->device}}</td>
				<td>{{$connection?->profile?->name??'-'}}</td>
				<td>{{$connection->guard}}</td>
				<td>{{$connection->ip_address}}</td>
				<td>{{$connection->created_at->isoFormat("ll")}}</td>
				<td>
					<button class="btn btn-danger btn-sm"><i class="ti ti-trash"></i></button>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@endsection

