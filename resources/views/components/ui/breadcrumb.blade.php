@props(['title','text1','url1','text2','url2','image','showImage'])
@php
    $title=$title??'Title';
    $text1=$text1??'Dashboard';
    $text2=$text2??null;
    $url1=$url1??route('home');
    $url2=$url2??null;
    $showImage=$showImage??true;
    $image = $image??asset('_materialize_v2/dist/images/breadcrumb/ChatBc.png');
@endphp
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">{!! $title !!}</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="{{$url1}}">{{$text1}}</a>
                        </li>
                        @if($text2)
                            <li class="breadcrumb-item" aria-current="page">
                                @if($url2)
                                    <a class="text-muted text-decoration-none" href="{{$url2}}">{{$text2}}</a>
                                @else
                                    {{$text2}}
                                @endif
                            </li>
                        @endif
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="{{$image}}" alt="" class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div>
</div>
