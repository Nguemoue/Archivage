@php
	$file = base_path('public/amoirie.jpg');
		$logo = \File::get($file);
@endphp
	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<style>
		*{
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}
		.square-box{
			display: inline-block;
			width: 18px;
			height: 18px;
			border: 1px solid green;
			margin: 0 4px;
		}
		.all_underline{
			display: inline-block;
			border-bottom: 1px solid black;
			width: 200px;
		}
	</style>
	<style>
		{!!  \File::get(base_path('public/assets/css/bootstrap/css/bootstrap.min.css')); !!}
	</style>
	<style>
		.dashed::after{
			content: '';
			margin-left: auto;
			margin-right: auto;
			/*background-color: red;*/
			display: block;
			position: relative;
			padding: 4px;
			width: 30%;
			height: 4px;
			border-bottom: 2px dashed black;
			/*border-bottom: 2px dashed black;*/
			/*border-bottom-width: medium;*/
			/*line-height: 2em;*/
		}
	</style>

</head>
<body >
<header class="row no-gutters align-items-center">

	<div class="col-4 text-center ">
		<div class="dashed">REPUBLIOUE DU CAMEROUN</div>
		<div class="dashed">Paix -Travail - PATRIE</div>
		<div class="dashed">
			MINISTERE DE L'ECONOMIE, DE LA PLANIFICATON
			ET DE L'AMENAGEMENT DU TERRITOIRE
		</div>
		<div class="dashed">SECRETARIAT  GENERAL</div>
		<div>
			SOUS-DIRECTION DE LA DOCUMENTATION ET DES ARCHIVES
		</div>
	</div>


	<div class="col-4  text-center">
		<img src="{{getDataUrl($logo)}}" width="70%" alt="Logo" class="img-fluid">
	</div>

	<div class="col-4 text-center ">
		<div class="dashed">
			REPUBLIC OF CAMEROON
		</div>
		<div class="dashed">			Peace - Work - Fatherland
		</div>
		<div class="dashed">
			MINISTRY OF ECONOMY, PLANNING
			AND REGIONAL DEVELOPMENT
		</div>
		<div class="dashed">
			GENERAL SECRETARIAT
		</div>
		<div >
			SUB DIRECTORATE OF DOCUMENTATION AND ARCHIVES
		</div>

	</div>
</header>
<br>
<br>
<div class="text-center w-75 mx-auto bg-success p-2 bg-gradient  text-white rounded-0">
	<h3 class="text-uppercase">Déclaration des taxes sur le chiffre d'affaires et impots sur le revenu</h3>
</div>

<br><br>
<table class="table w-100">
	<tr>
		<td>Regime d'imposition:</td>
		<td><span class="square-box"></span> Réel</td>
		<td><span class="square-box"></span> Simplifié</td>
		<td><span>Exercice Fiscale 20 ....... </span><br><span>Mois de .................</span></td>
	</tr>
	<tr>
		<td>Numero identifiant unique (NIU)</td>
		<td colspan="3">
			@foreach(range(1,10) as $box)
				<span style="width: 20px;height: 20px;border:1px solid green;border-top: none;display: inline-block">{{$box}}</span>
			@endforeach
		</td>
	</tr>
	<tr>
		<td colspan="4">Nom ou Raison sociale: <span class="d-inline-block w-75" style="border-bottom: 1px solid black"></span></td>
	</tr>
	<tr>
		<td>Ville: <span class="all_underline"></span></td>
		<td>Commune: <span class="all_underline"></span></td>
		<td>Quartier: <span class="all_underline"></span></td>
		<td>Lieu Dit: <span class="all_underline"></span></td>
	</tr>
	<tr>
		<td>B.P:
			@foreach(range(1,5) as $box)
				<span style="width: 20px;height: 20px;border:1px solid green;border-top: none;display: inline-block"></span>
			@endforeach
		</td>
		<td>Tél.fixe:
			@foreach(range(1,9) as $box)
				<span style="width: 20px;height: 20px;border:1px solid green;border-top: none;display: inline-block"></span>
			@endforeach
		</td>
		<td>Tel.Mobile:
			@foreach(range(1,9) as $box)
				<span style="width: 20px;height: 20px;border:1px solid green;border-top: none;display: inline-block"></span>
			@endforeach
		</td>
		<td>B.P:
			@foreach(range(1,5) as $box)
				<span style="width: 20px;height: 20px;border:1px solid green;border-top: none;display: inline-block"></span>
			@endforeach
		</td>
	</tr>
	<tr>
		<td colspan="3">
			Addresse électronique (e-mail):<span class="all_underline" style="width:500px"></span>
		</td>
		<td>
			Fax:
			@foreach(range(1,9) as $box)
				<span style="width: 20px;height: 20px;border:1px solid green;border-top: none;display: inline-block"></span>
			@endforeach
		</td>
	</tr>
</table>
<br>
@if(isset($button))

<form action="{{route('fiscal-pdf.store')}}" class="w-25 mx-auto" method="post">
	@csrf
	<button class="btn btn-success">Sauvegarder</button>
</form>
@endif
<br>
</body>
</html>

