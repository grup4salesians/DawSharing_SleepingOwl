@extends('layouts.default')
@section('title')
Detalls del Viatge
@stop
@section('content')
<style>
	.perfilInfo {
		margin: 0 auto;
		width: 500px;
		text-align: center;
		display: block;
	}
</style>
<div style="min-height: 400px; margin: 0 10%;">
	<?php 
	$idViatge = 0;
	$ruta_id = 0;
	$usuari_id = 0;
	$vehicles_id = 0;
	$permissos = "NA";
	$data = 0;
	$preu = 999999999999;
	$seientsLliures = 0;
	$seientsTotals = 0;
	$duracio = 0;
	$ruta_inici = "";
	$ruta_fi = "";
	$creador = "";
	$fotoPerfil = "";
	$anys = 0;
	$membreDesde = "00/0/0000";
	try {
		$idViatge = $_GET['idViatge'];
		$infoViatge = Viatge::where('id', $idViatge)->get();
		$ruta_id = $infoViatge[0]->ruta_id;
		$usuari_id = $infoViatge[0]->usuari_id;
		$vehicles_id = $infoViatge[0]->vehicles_id;

		$infoRuta = Ruta::where('id', $ruta_id)->get();
		$ruta_inici = $infoRuta[0]->inici_ruta;
		$ruta_fi = $infoRuta[0]->fi_ruta;

		$infoUsuari = Usuari::where('id', $usuari_id)->get();
		$creador = $infoUsuari[0]->nom;
		$fotoPerfil = $infoUsuari[0]->foto;
		$data_naixement = $infoUsuari[0]->data_naixement;
		$dataNow = date("Y-m-d H:i:s");
		$anys = strtotime($dataNow) - strtotime($data_naixement);
		$anys = $anys / (60 * 60 * 24 * 365);
		$anys = floor($anys);
		$membreDesde = $infoUsuari[0]->fecha_inscripcion;

		$permissos = $infoViatge[0]->permissos;
		$data = $infoViatge[0]->data;
		$preu = $infoViatge[0]->preu;
		$seientsLliures = $infoViatge[0]->numSeientRestant;
		$seientsTotals = $infoViatge[0]->numSeientDisponible;
		$duracio = $infoViatge[0]->duracio;
	}
	catch(Exception $e) {
		echo '<div class="alert alert-danger">';
		echo 'Error en el viatge!';
		echo '</div>';
	}

	//$comentari = "Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. ";
	//$sollicitud = "Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. "; 
	
	//$descUser = "Bla bla blblablala blabalba bl, blalabla blab abla blalba blab alba bla blabalab albab albalalb ablalbalb abla balblalb ablaba ñ. alb alba lababla blab alb ablaalal abla a.";
	
		function permissos($p_permissos) {
			$codi = "";
			$arrayPermissos = explode(";", $p_permissos);

			foreach ($arrayPermissos as $key => $value) {
				//Equipatge gran;Fumar;Animals;Menjar i/o beure

				switch ($value) {
					case 'Equipatge gran':
						# code...
						$codi = $codi . '<i class="fa fa-suitcase fa-5x"></i>&nbsp;';
						break;
					case 'Fumar':
						# code...
						$codi = $codi . '<i class="fa fa-magic fa-5x"></i>&nbsp;';
						break;
					case 'Animals':
						# code..
						$codi = $codi . '<i class="fa fa-paw fa-5x"></i>&nbsp;';
						break;
					case 'Menjar i/o beure':
						# code...
						$codi = $codi . '<i class="fa fa-cutlery fa-5x"></i>&nbsp;';
						break;

					default:
						# code...
						
						break;
				}
				
			}
			echo $codi;
		}

	?>
	<h1>Viatje entre {{ $ruta_inici }} i {{ $ruta_fi }} amb {{$creador}} ({{ $duracio }} min)</h1>
		<div>
			<div class="fleft" style="width: 66.6%;">
				<div id="map_canvas" style="height: 250px; background-color:grey; margin-bottom:5px;"></div>
				<div>
					<!--<div id="vehicle" class="fright" style="height:130px;">
						<img width="200" src="img/cache/original/vehicles/{{-- $fotoVehicle --}}" />
					</div>-->
					<div id="vehicle" class="fright clear"><?php permissos($permissos); ?></div>
					
					<h3>{{ $data }}</h3> <br />
					{{ Form::label('Pagament en efectiu') }}<br />
					{{ Form::label('inici', $ruta_inici) }}<br />
					{{ Form::label('fi', $ruta_fi) }}<br />
<!--
					<div class="clear">
						{{-- Form::label('comentari', 'Comentari:') --}}<br />
						{{-- Form::label('comentari', $comentari, array('style' => 'solid: 1px black; background-color:lightgrey;')) --}}<br />
					</div>
					</br>
					<div>
						{{-- Form::label('sollicitud', 'Sol·licitud:') --}}<br />
						{{-- Form::label('comentari', $sollicitud, array('style' => 'solid: 1px black; background-color:lightgrey;')) --}}<br />
					</div>
-->
				</div>
			</div>
			<div class="fright" style="width: 33.3%;">
			<div class="perfilInfo">
				<h3 style="margin: 0;">{{ $preu }}€ / Plaça</h3>
				<h4>{{ $seientsLliures }} lliures de {{ $seientsTotals }}</h4>
				<div style="" class="fotoPerfil"><img width="200" src="img/cache/original/usuaris/{{ $fotoPerfil }}" /></div>
				<h3>{{$creador}}</h3>
				<h4>{{ $anys }}</h4>
				<!--{{-- Form::label('descUser', $descUser) --}}<p />-->
				<span>Membre des de {{ Form::label('membre', $membreDesde) }}</span>
			</div>
			</div>
			<div class="clear">
				
			</div>
		</div>
</div>
<div class="clear"></div>
@stop