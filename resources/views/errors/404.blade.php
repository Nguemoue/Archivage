{{--@extends('errors::minimal')--}}
@extends("errors.illustrated-layout")

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))
@section("image")
	<img src="{{asset('assets/images/user-bg.jpg')}}" alt="">
@endsection
