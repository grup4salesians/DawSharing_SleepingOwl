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
             {{Form::hidden('distancia',Input::old('distancia'))}}
            {{ Form::submit('Calcular!',array('class'=> 'Registre_button'))}}
            {{ Form::close() }}
        </div>
    </div>
</div>
    
    <script type="text/javascript">
     document.getElementById("distancia").value = document.getElementById("distance").value;
    </script>
@stop



