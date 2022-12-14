@extends('template')


@section('title', 'SDDA - home')

@section('header')
    <x-dashboard-component :titre="'SDDA'" :description="'Page d\'acceuil de SDDA'" :chemin="['DGPAT', 'SDDA']" />
@endsection

@section('content')
    <div class="container">
        <div class="row  gap-12 " >
            <a href="{{ route('fichiers.create') }}" class="d-block bg-success col-5 mx-auto border p-4 text-center ">
                <span class="fa fa-file"></span>
                Ajouter un fichier
            </a>

            <a href="#" class="d-block col-5 bg-danger mx-auto border p-4 text-center">
                <span class="fa fa-folder-open"></span>
                Ajouter un Dossier
            </a>

            <a href="{{ route('fichiers.index') }}" class="d-block col-5 bg-secondary mx-auto mt-4 text-white border p-4 text-center">
                <span class="fa fa-folder-o"></span>
                Liste des FIchier
            </a>
        </div>
    </div>
@endsection
