@extends('layouts.default')
@section('title')
Detalls del Viatge
@stop
@section('content')
<div style="min-height: 400px; margin: 0% 10%;">
	<?php $ruta_inici = "Barcelona";
	$ruta_fi = "Tarragona";
	$creador = "Joan";?>
	<h1>Viatja entre {{ $ruta_inici }} i {{ $ruta_fi }} amb {{$creador}}</h1>
		<div>
			<div class="fleft" style="width: 66%;">
				<div id="map_canvas" style="height: 250px; background-color:grey; margin-bottom:5px;"></div>
				<div>
					<div id="vehicle" class="fright" style="height:130px;">[ER COSHEZITOH]</div>
					<div id="vehicle" class="fright clear">[PERMIZOH DER KOSHEE]</div>
					<?php $data = "LADATAAAAA A AA A AA A  AAAA";
					$comentari = "Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. " ?>
					{{ Form::label('data', $data) }}<br />
					{{ Form::label('pagament', 'Pagament en efectiu') }}<br />
					{{ Form::label('inici', $ruta_inici) }}<br />
					{{ Form::label('fi', $ruta_fi) }}<br />
					<div>
						
					{{ Form::label('comentari', 'Comentari:', array('class'=>'clear')) }}<br />
					{{ Form::label('comentari', $comentari, array('style' => 'solid: 1px black; background-color:lightgrey;')) }}<br />
					</div>

				</div>
			</div>
			<div class="fleft">
				
			</div>
			<div class="clear">
				
			</div>
		</div>
</div>
<div class="clear"></div>
@stop
