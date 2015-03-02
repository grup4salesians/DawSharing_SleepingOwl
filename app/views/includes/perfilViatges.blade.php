@include('includes.blockRuta')
<?php
$passatgers = Passatger::where('usuari_id', Auth::user()->id)->get();
$viatgesJoin = Viatge::join('passatgers', 'ViewViatges.usuari_id', '=', 'passatgers.usuari_id')->where('ViewViatges.usuari_id', Auth::user()->id);
echo "<div style='overflow:auto;height: 740px;position: relative;width: 583px;'>";
foreach ($passatgers as $key => $val) {
	$estatPassatger = $val->estat;
	switch ($estatPassatger) {
		case 'acceptat':
			# code...
			$colorEstat = "rgb(228, 247, 230)";
			break;
		case 'pendent':
			# code...
			$colorEstat = "#FFF0AD";
			break;
		case 'denegat':
			# code...
			$colorEstat = "rgb(247, 228, 228)";
			break;
		case 'creador':
			# code...
			$colorEstat = "rgb(228, 247, 230)";
			break;
		default:
			# code...
			$colorEstat = "#FFF0AD";
			break;
	}
    $viatges = Viatge::where('id', $val->viatge_id)->where('data', '>=', date('d-m-Y'))->orderBy('id', 'desc')->get(); 
    $ruta = Ruta::where('id', $viatges[0]->ruta_id)->get();
    $ruta1 = new blockRuta($viatges[0]->id, $viatges[0]->data, $ruta[0]->inici_ruta, $ruta[0]->fi_ruta, $viatges[0]->preu, $viatges[0]->numSeientRestant, $viatges[0]->permissos);
    echo "<div style='width: 550px;background-color: $colorEstat; margin-bottom:10px;'>";
    echo $ruta1->mostrarMapa();
    echo "<span style='text-transform: capitalize;margin: 1px auto;text-align: center;display: block;'>".$estatPassatger."</spam>";
    echo '</div>';
}
echo "</div>";
?>