<script type="text/javascript">
    $(document).ready(function(){

        $('#sandbox-container .input-group.date').datepicker({
            format: "dd/mm/yyyy",
            startDate: "today",
            language: "es",
            multidate: false,
            todayHighlight: true
        });
    });
 </script>
<div id="cont-Pas-2" style="display: none" class="visible testtest">
    <div id="CampsPas2" class="PublicarViatge_CampsPas2 col-md-6">
        <div class="form-group">
            {{ Form::label('frequencia', 'Freqüencia') }}
            {{ Form::radio('frequencia', 'data_concreta') }}  
            {{ Form::label('frequencia','Data Concreta', array('style'=>'normal')) }} 
            {{ Form::radio('frequencia', 'viatge_periodic') }}  
            {{ Form::label('frequencia','Viatge Periòdic') }} 
        </div>
        <div class="form-group">
            {{ Form::label('tipus', 'Tipus') }}
            {{ Form::radio('tipus', 'data_concreta') }}  
            {{ Form::label('tipus','Data Concreta') }} 
            {{ Form::radio('tipus', 'viatge_periodic') }}  
            {{ Form::label('tipus','Viatge Periòdic') }} 
        </div>   
        <div class="form-group">
            {{ Form::label('anda', 'Anada') }}
            
            <div class="input-group date">
                <input type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
            </div>
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