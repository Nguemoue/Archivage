<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<style>
		* {
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}

		#header {
			margin-top: 80px;
			font-size: 8px;
			display: inline-block;
			justify-content: space-between;
			/*align-content: stretch;*/
			align-items: stretch;
		}

		#header > div {
			border: 1px solid black;
			text-align: center;
		}

		.part-left {
			margin-left: 20px;
			display: inline-block;
			width: 45%;
		}

		.part-right {
			display: inline-block;
			width: 45%;
		}
		.text-center{
			text-align: center;
		}
		.text-underline{
			text-decoration: underline;
		}

	</style>
</head>
<body>
<header id="header">
	<div class="part-left">
		<p>
			REPUBLIOUE DU CAMEROUN
			Paix -Travail - PATRIE
		</p>
		-------------------------------------------
		<p>
			MINISTERE DE L'ECONOMIE, DE LA PLANIFICATON
			ET DE L'AMENAGEMENT DU TERRITOIRE
		</p>
		---------
		<p>
			DIRECTION GENERALE DE LA PLANIFICATION
			ET DE L'AMENAGEMENT DU TERRITOIRE
		</p>
		------------------------
		<p>
			DIRECTEUR GENERAL
		</p>
		----------------
		<p>
			DIRECTION DE L'AMENAGEMENT DU TERRITOIRE ET DE LA
			MISE NE VALEUR DES ZONES FRONTALIERS
		</p>
		----------------
	</div>
	{{--		<div class="part-center"></div>--}}
	<div class="part-right">
		<p>
			REPUBLIC OF CAMEROON
			Peace - Work - Fatherland
		</p>
		------------------------
		<p>
			MINISTRY OF ECONOMY, PLANNING
			AND REGIONAL DEVELOPMENT
		</p>
		----------------------------
		<p>
			GENERAL SECRETARIAT
		</p>-----------------------------------
		<p>
			GENERAL DIRECTORATE OF PLANNING
			AND REGIONAL DEVELOPMENT
			DEPARTMENT OF REGIONAL
			AND BORDER AREA DEVELOPMENT
		</p>
		----------------------------
		<p>
			SUBDEPARTEMENT OF BORDERLESS AND AREA
		</p>
		-----------
	</div>
</header>
<br>
<br>
<h1 class="text-center text-underline">Titre du Document</h1>
</body>
</html>
