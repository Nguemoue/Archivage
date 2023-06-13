{{--@extends('errors::minimal')--}}
@extends("errors.illustrated-layout")
@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('Unauthorized'))
@section("image")
	<img src="{{asset('assets/images/user-bg.jpg')}}" alt="">
@endsection
