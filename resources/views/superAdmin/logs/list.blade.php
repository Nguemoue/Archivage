@extends("template_super_admin")

@section("content")
	<h5 class="text-center my-3">
		Liste des Logs du systeme
	</h5>
	<hr>

	<div class="card">
		<div class="card-body">
			<table class="table datatable">
				<thead>
				<tr>
					<th>#</th>
					<th>Context</th>
					<th>Resource</th>
					<th>Emit Par</th>
					<th>Date d'emission</th>
					<th>Actions</th>
				</tr>
				</thead>
				<tbody>
				@foreach($logs as $item)
					<tr>
						<td>{{$loop->index+1}}</td>
						<td>{{$item->action}}</td>
						<td><span class="badge badge-info badge-lg">{{$item->target->logTargetForHumans()}}</span></td>
						<td><span class="badge badge-secondary badge-lg">{{$item->actor->logActorForHumans()}}</span></td>
						<td>{{$item->created_at->isoFormat("lll")}}</td>
						<td>
							<div class="d-flex">
								<a href="#" data-toggle="modal" class="btn btn-outline-info btn-sm" data-target="#modalShow{{$item->id}}"><i class="fa fa-eye"></i></a>
								@includeIf("superAdmin.logs.includes.modalShow",['item'=>$item])
								<form action="{{route('superAdmin.log.destroy',['key'=>$item->id])}}" method="post">
									@csrf
									<button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
								</form>
							</div>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			@if($logs->hasMorePages())
			<div class="card-footer">
				{{$logs->links()}}
			</div>
			@endif

		</div>
	</div>

@endsection

