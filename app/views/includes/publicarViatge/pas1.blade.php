<div id="cont-Pas-1" style="display: none" class="visible testtest">
    <div id="CampsPas1" class="PublicarViatge_CampsPas1 col-md-6">
        <div class="form-group">
            {{ Form::label('MeuVehicle', 'El meu vehicle') }}
            {{ Form::select('meuVehicle', $arrayVehicles,null,array('class' => 'PublicarViatge_Elementos')) }}   
        </div>
        <div class="form-group">
            {{ Form::label('Origen', 'Origen') }}
            {{ Form::text('searchTextField',$origen,array('class' => 'PublicarViatge_Elementos','id'=>'searchTextField')) }} 

        </div>   
        <div class="form-group">
            {{ Form::label('Destinacio', 'Destinació') }}
            {{ Form::text('searchTextFieldFin',$desti,array('class' => 'PublicarViatge_Elementos','id'=>'searchTextFieldFin')) }} 
        </div>
    </div>
    <div id="Mapa" class="PublicarViatge_Mapa col-md-6">
        <div id="map_canvas" class="PublicarViatge_MapCanvas"></div>
        <div id="MapaDistancia">
            <span class="PublicarViarge_Distancia">  Distància: </span> <div id="distance"> </div> <!--El div distance es para poner la distancia, lo calcula ApiGoogleViatgeDetalls.js-->
        </div>
    </div>
    <div style="clear: both;"></div>
</div>