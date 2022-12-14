{{-- @props(["titre","description","chemin"]) --}}
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{ $titre }}</h5>
                    <p class="m-b-0">{{$description }}
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}"> <i class="fa fa-home"></i> </a>
                    </li>
                    @foreach ($chemin as $item)                    
                        <li class="breadcrumb-item"><a href="#!">{{ $item }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
