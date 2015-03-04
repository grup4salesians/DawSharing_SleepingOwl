@extends('layouts.default')
@section('title')
Contactar
@stop
@section('subtitle')
Contacta amb nosaltres!
@stop
@section('content')
<script src="http://maps.google.com/maps/api/js?libraries=places&region=sp&language=es&sensor=true"></script>
<script src="js/ApiGoogleMaps_Prueba.js"></script>




<div class="paginacontactar">


    <div class="rooms text-center">
        <p>
        <h2>Calcula el estalvi que pots tenir viatjan amb nosaltres!</h2>
        </p>

        <div id="map_canvas" style="height: 300px; width: 800px;margin:auto;"></div>
        <div id="distance" style="width:200px; margin:auto;"></div>

        <div class='contactar'>
            @if ($errors->has())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                {{ $error }}<br>        
                @endforeach
            </div>
            @endif
            {{ Form::open(array('url' => '/calculEstalvi')) }}

            {{ Form::label('Origen', 'Origen') }}
            <br>
            {{ Form::text('searchTextField', Input::old('searchTextField'),array('id'=>'searchTextField')) }}
            <br>
            {{ Form::label('Desti', 'Destí') }}
            <br>
            {{ Form::text('SearchTextFieldFin', Input::old('SearchTextFieldFin'),array('id'=>'searchTextFieldFin')) }}
            <br>
            {{ Form::label('L/100', 'L/100') }}
            <br>
            {{ Form::text('l100', Input::old('l100'),array()) }}
            <br>
            {{ Form::label('€/L', '€/L') }}
            <br>
            {{ Form::text('€/L', Input::old('€/L'),array()) }}
            <br>
            <br>
            {{Form::hidden('distancia',Input::old('distancia'),array('id'=>'distancia'))}}
            {{ Form::submit('Calcular!',array('class'=> 'Registre_button','onClick' => 'test()'))}}
            {{ Form::close() }}

            <?php
            if(!(empty($userdata))){
                
           
            $str = str_replace(",", ".", $userdata['distancia']);
            $distancia = substr($str, 0, -2);

             $unapersona = ($userdata['litroskm'] * $userdata['distancia'] / 100) * $userdata['euroslitro'];
            $dospersonas = (($userdata['litroskm'] * $userdata['distancia'] / 100) * $userdata['euroslitro'] / 2);
             $trespersonas = (($userdata['litroskm'] * $userdata['distancia'] / 100) * $userdata['euroslitro'] / 3);
            $cuatropersonas = (($userdata['litroskm'] * $userdata['distancia'] / 100) * $userdata['euroslitro'] / 4);
            ?>

            <div style="height: auto; width: 800px;margin:auto;">
                <h1> El teu estalvi</h1>
                <h4>
                Distancia: <?php echo $userdata['distancia']; ?><br>
                Anant tu sol: <b><?php echo number_format((float) $unapersona, 2, '.', ''); ?>€</b><br>
                Compartint amb un: <b><?php echo number_format((float) $dospersonas, 2, '.', ''); ?>€</b><br>
                Compartint amb dos: <b><?php echo number_format((float) $trespersonas, 2, '.', ''); ?>€</b><br>
                Compartint amb tres:<b> <?php echo number_format((float) $cuatropersonas, 2, '.', ''); ?>€</b><br>
                </h4>
            </div>
    <?php } ?>
        </div>
    </div>


</div>

<script type="text/javascript"> 
    function test() {
        document.getElementById("distancia").value = document.getElementById("distance").innerHTML;
    }
</script>
@stop



