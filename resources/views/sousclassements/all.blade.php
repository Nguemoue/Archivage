@extends('template')

@section('content')
    <div class="container">
        <h2 class="text-center">Listes des Sous Dossier de Classement</h2>

        <div class="card ">
            <div class="card-header">
                <h4 class="card-title text-center">Pour Chaque Classement</h4>
            </div>
            <div class="card-body">
                @includeIf('_partials.errors')
            </div>
            <div class="card-footer">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Date de creation</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($classements as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->nom }}</td>
                            <td>{{ $item->created_at->IsoFormat('lll') }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">

                                    <a href="{{ route('classement.sousclassement.index',[$item->id]) }}" class="btn btn-sm btn-success">
                                        <span class="fa fa-cogs"></span></a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-warning">
                            acucune donnes trouvee
                        </div>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ mix('js/app.js') }}"></script>
@endpush

@push('styles')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
