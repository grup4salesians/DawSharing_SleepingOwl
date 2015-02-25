@extends('layouts.buscar')
@section('title')
Contactar
@stop
@section('subtitle')
Contacta amb nosaltres!
@stop
@section('content')
@include('includes.blockRuta')

<?php
$origen = Input::get('searchTextField');
$destino = Input::get('searchTextFieldFin');
?>

<div class="paginabuscar">
    <div class="rooms text-center">
        <span style="text-align:center;font-size:25px;font-weight:bold;margin-top:20px;"><h1>Viatges des de ({{Input::get('searchTextField')}}  fins a {{Input::get('searchTextFieldFin')}})</h1></span>

<?php $idrutas = Ruta::where('inici_ruta', 'LIKE', "%$origen%")->where('fi_ruta', 'LIKE', "%$destino%")->get(); 

if(count($idrutas) < 1){ 
    echo '<h2 style="margin-top:20px";> No hi ha rutes amb el origen i destí seleccionats</h2>';
}
else{ ?>
    <div style="margin:auto; width: 80%;">
            <?php
            $viatges = Viatge::orderBy('id', 'desc')->get();
            ?>
            @foreach($idrutas as $idruta)
            @foreach($viatges as $key => $val)
            <div class="col-md-1"></div>
            <div class="col-md-4 room-sec">
                <?php
                $ruta = Ruta::where('id', '=', $idruta->id)->get();
                $ruta1 = new blockRuta($val->id, $val->data, $ruta[0]->inici_ruta, $ruta[0]->fi_ruta, $val->preu, $val->numSeientRestant, $val->permissos);
                ?>
                {{ $ruta1->mostrarMapa() }}
                <div style="width: 10px;"></div>
            </div>
             <div class="col-md-1"></div>

            @if($key%2)
            <div class="clearfix"></div>
            @endif
            @endforeach
            @endforeach
            <div class="clearfix"></div>
        </div>
<?php }?>
        
        
    </div>

</div>


    <script type='text/javascript'>
        document.getElementById("searchTextField").value = "<?php echo $origen ?>";
        document.getElementById("searchTextFieldFin").value = "<?php echo $destino ?>";
    </script>
    @stop
