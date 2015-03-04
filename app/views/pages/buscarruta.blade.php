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
<?php 
$año = date("Y");
       $mes = date("m");
       $dia = date("d");
       $dia1 = date("d");
       $fechaactual = $año.'-'.$mes.'-'.$dia;
       $fechaactual1 = $año.'-'.$mes.'-'.$dia1;
       
$idrutas = Ruta::where('inici_ruta', 'LIKE', "%$origen%")->where('fi_ruta', 'LIKE', "%$destino%")->paginate(10); 
if(!(empty(Input::get('fecha')))){
  $fecha = Input::get('fecha');  
  $fecha1 = Input::get('fecha1');
   $preumax = Input::get('preumax');
  $viatges = Viatge::whereBetween('data',array("$fecha","$fecha1"))->where('preu','<=',"$preumax")->orderBy('data','asc')->paginate(10);
}else{
    $viatges = Viatge::where('data','>=',"$fechaactual")->orderBy('data','asc')->paginate(10);
}


if(count($viatges) < 1){ 
    echo '<h2 style="margin-top:20px";> No hi ha rutes amb el origen i destí seleccionats</h2>';
}
else{ ?>
         <div class="filtrar">
             {{ Form::open(array('url' => '/buscarruta')) }}
           Des de <input type="date" value="<?php if(!(empty(Input::get('fecha')))){ echo Input::get('fecha');} else { echo $fechaactual; } ?>" id="fecha" name="fecha">
           Fins a <input type="date" value="<?php if(!(empty(Input::get('fecha')))){ echo Input::get('fecha1');} else { echo $fechaactual1; } ?>" id="fecha1" name="fecha1">
          Preu máxim <input type="number" placeholder="preu max" id="preumax" name="preumax" value="50" style="width:80px;">
            <input id="searchTextField" type="hidden" name="searchTextField" value="<?php echo $origen ?>">
            <input id="searchTextFieldFin" type="hidden" name="searchTextFieldFin" value="<?php echo $destino ?>">
            <input type="submit" value="Filtrar"> 
          {{ Form::close() }}        
        </div>

    <div style="margin:auto; width: 80%;">
            <?php
            
            ?>
           
            @foreach($viatges as $key => $val)
            <div class="col-md-1"></div>
            <div class="col-md-4 room-sec">
                <?php
                $userInfo = Usuari::where('id', $val->usuari_id)->get();
                $fotoUser = $userInfo[0]->foto;
                $ruta = Ruta::where('id', '=', $idrutas[0]->id)->paginate(10);
                $ruta1 = new blockRuta($val->id, $val->data, $ruta[0]->inici_ruta, $ruta[0]->fi_ruta, $val->preu, $val->numSeientRestant, $val->permissos, $fotoUser);

                ?>
                {{ $ruta1->mostrarMapa() }}
                <div style="width: 10px;"></div>
            </div>
             <div class="col-md-1"></div>

            @if($key%2)
            <div class="clearfix"></div>
            @endif
            @endforeach
            
            <div class="clearfix"></div>
        </div>
       
<?php echo $viatges->appends(['searchTextField' => $origen,'searchTextFieldFin' => $destino])->links(); }?>
        
        
    </div>

</div>


    <script type='text/javascript'>
        document.getElementById("searchTextField").value = "<?php echo $origen ?>";
        document.getElementById("searchTextFieldFin").value = "<?php echo $destino ?>";
    </script>
    @stop
