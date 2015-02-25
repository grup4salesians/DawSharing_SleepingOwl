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
<div id="cont-Pas-2" style="display: none" class="visible testtest PublicarViatge_CampsPas2 col-md-6">
    <div class="form-group" style="display:inline-block;margin-right:200px;">
        {{ Form::label('Freqüencia') }}</br>

        {{ Form::radio('frequencia', 'data_concreta', true, array('id' => 'data_concreta')) }}  
        {{ Form::label('data_concreta','Data Concreta', array('style'=>'font-weight:normal;')) }} </br>

        {{ Form::radio('frequencia', 'viatge_periodic', false, array('id' => 'viatge_periodic')) }}  
        {{ Form::label('viatge_periodic','Viatge Periòdic', array('style'=>'font-weight:normal;')) }} 
        
    </div>
    <div class="form-group" style="display:inline-block;">
        {{ Form::label('Tipus') }}</br>
        
        {{ Form::radio('tipus', 'anada', true, array('id' => 'anada')) }}
        {{ Form::label('anada','Anada', array('style'=>'font-weight:normal;')) }} </br>
        
        {{ Form::radio('tipus', 'anada_i_tornada', false, array('id' => 'anadaitornada')) }}  
        {{ Form::label('anadaitornada','Anada i tornada', array('style'=>'font-weight:normal;')) }} 
        
    </div>   
    </p>
    <div class="form-group" id="anadaConcreta" style="display:inline-block;margin-right: 88px;">
        {{ Form::label('andaData', 'Anada') }}
        <div id="sandbox-container" style="width:230px;">
            <div class="input-group date">
                <input disabled type="text" class="form-control" style="cursor: inherit;" value="{{date('d-m-Y')}}"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
            </div>
        </div>
    </p>
        {{ Form::label('anadaHora', 'Hora') }}
        <div class="input-group bootstrap-timepicker" style="width: 206px;">
            <input id="anadaHora" type="text" class="form-control">
            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
        </div>
 
        <script type="text/javascript">
            $('#anadaHora').timepicker();
        </script>
    </div>
    <div class="form-group" id="tornadaConcreta" style="display:inline-block;">
        {{ Form::label('tornadaData', 'Tornada') }}
        <div id="sandbox-container" style="width:230px;">
            <div class="input-group date">
                <input disabled type="text" class="form-control" style="cursor: inherit;" value="{{date('d-m-Y')}}"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
            </div>
        </div>
    </p>
        {{ Form::label('tornadaHora', 'Hora') }}
        <div class="input-group bootstrap-timepicker" style="width: 206px;">
            <input id="tornadaHora" type="text" class="form-control">
            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
        </div>
 
        <script type="text/javascript">
            $('#tornadaHora').timepicker();
        </script>
    </div>

    <!-- Checkbox per periodic-->
</div>