@extends("template_admin")

@section("content")
	<h5 class="text-center my-3">
		<p>
			{{auth(adminGuard())->user()->name}}
		</p>
	</h5>
	<hr>

	<div class="row gap-1  border"
		  style="gap:4px 0px;font-family: 'Algerian',serif;letter-spacing: 2px;font-size: 5em;font-weight: bolder">
		<x-permission :permissions="[config('perm_names.MAN_USER'),config('perm_names.CREATE_USER')]" operand="or">
			<div class="col-6">
				<a href="{{route('admin.user.account.list')}}" style="line-height: 100px;"
					class="w-100 btn btn-outline-success">
					<span class="fa fa-user-secret fa-2x"></span>
					Gerer les utilisateur
				</a>
			</div>
		</x-permission>
		<x-permission :permissions="[config('perm_names.NAV_STRUCTURE')]">
			<div class="col-6">
				<a href="{{route('admin.structure.navigate.own')}}"
					style="line-height: 100px;"
					class="w-100 btn btn-outline-info">
					<span class="fa fa-meanpath fa-2x"></span>
					Navigater Sur sa structure
				</a>
			</div>
		</x-permission>
		<x-permission :permissions="[config('perm_names.NAV_STRUCTURE_ALL')]">
			<div class="col-6">
				<a href="#" data-target="#selectStructureModal" data-toggle="modal"
					class="w-100 btn btn-outline-primary" style="line-height: 100px;" >
					<span class="fa fa-folder-open-o fa-2x"></span>
					Navigater Sur Toutes Les Structures
				</a>
				<x-modal-component id="selectStructureModal" :title="'selectionner La structure '">
					<div>
						@foreach($structures as $structure)
							<a href="{{route('admin.structure.navigate.other',['structureId'=>$structure->id])}}" class="btn btn-outline-secondary p-4">
								<i class="fa fa-folder-o"></i>
								{{$structure->nom}}
							</a>
						@endforeach
					</div>

				</x-modal-component>
			</div>
		</x-permission>


		<div class="col-6">
			<a href="#!" style="line-height: 100px;" class="w-100 btn btn-outline-secondary">
				<span class="fa fa-folder fa-2x"></span>
				Gestion des Ressources
			</a>
		</div>
	</div>
@endsection
