@include('includes.blockRuta')
<?php
$passatgers = Passatger::where('usuari_id', Auth::user()->id)->get();
foreach ($passatgers as $key => $val) {
	$estatPassatger = $val->estat;
    $viatges = Viatge::where('id', $val->viatge_id)->where('data', '>=', date('d-m-Y'))->orderBy('id', 'desc')->get(); 
    $ruta = Ruta::where('id', $viatges[0]->ruta_id)->get();
    $ruta1 = new blockRuta($viatges[0]->id, $viatges[0]->data, $ruta[0]->inici_ruta, $ruta[0]->fi_ruta, $viatges[0]->preu, $viatges[0]->numSeientRestant, $viatges[0]->permissos);
    echo '<div style="width: 550px;background-color: rgb(228, 247, 230);">';
    echo $ruta1->mostrarMapa();
    echo $estatPassatger;
    echo '</div>';
}
?>

