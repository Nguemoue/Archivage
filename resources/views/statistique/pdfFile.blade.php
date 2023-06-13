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
<h1 class="text-center text-underline" id="de">Titre du Document</h1>

</body>
</html>

