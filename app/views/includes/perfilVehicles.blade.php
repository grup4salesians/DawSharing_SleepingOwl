<?php 
$passatgers = Passatger::where('usuari_id', Auth::user()->id)->get();
@foreach ($passatgers as $key => $val) {
    $viatges = Viatge::where('id', $val->viatge_id)->where('data', '>=', date('d-m-Y'))->orderBy('id', 'desc')->get(); 
    $ruta = Ruta::where('id', $val->ruta_id)->get();
    $ruta1 = new blockRuta($val->id, $val->data, $ruta[0]->inici_ruta, $ruta[0]->fi_ruta, $val->preu, $val->numSeientRestant, $val->permissos);
    $ruta1->mostrarMapa();
}
?>

