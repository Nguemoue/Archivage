@extends('layouts._materializev2._materializev2')

@section('header')
	@include("templates.templateSuperAdmin.partials.headerSuperAdmin")
@endsection

@section('sidebar')
	@include("templates.templateSuperAdmin.partials.sidebarSuperAdmin")
@endsection

@section('content')
	@yield('content')
@endsection
