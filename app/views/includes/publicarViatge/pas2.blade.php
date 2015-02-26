<script type="text/javascript">
    $(document).ready(function(){

        $('#sandbox-container .input-group.date').datepicker({
            format: "dd/mm/yyyy",
            startDate: "today",
            language: "es",
            multidate: false,
            todayHighlight: true
        });


        $('#anada').change(function(){
            $('#tornada').hide();
        });
        $('#anadaitornada').change(function(){
            $('#tornada').show();
        });
    });

    function mostrarFrequencia(){
        $('#anadaData').toggle();
        $('#anadaPeriodic').toggle();
        
        $('#tornadaData').toggle();
        $('#tornadaPeriodic').toggle();
    }
 </script>
<div id="cont-Pas-2" style="display: none" class="testtest PublicarViatge_CampsPas2 col-md-6">
    <div class="form-group" style="display:inline-block;margin-right:200px;">
        {{ Form::label('Freqüencia') }}</br>

        {{ Form::radio('frequencia', 'data_concreta', true, array('id' => 'data_concreta', 'onchange' => 'mostrarFrequencia()')) }}  
        {{ Form::label('data_concreta','Data Concreta', array('style'=>'font-weight:normal;')) }} </br>

        {{ Form::radio('frequencia', 'viatge_periodic', false, array('id' => 'viatge_periodic', 'onchange' => 'mostrarFrequencia()')) }}  
        {{ Form::label('viatge_periodic','Viatge Periòdic', array('style'=>'font-weight:normal;')) }} 
        
    </div>
    <div class="form-group" style="display:inline-block;">
        {{ Form::label('Tipus') }}</br>
        
        {{ Form::radio('tipus', 'anada', true, array('id' => 'anada')) }}
        {{ Form::label('anada','Anada', array('style'=>'font-weight:normal;')) }} </br>
        
        {{ Form::radio('tipus', 'anada_i_tornada', false, array('id' => 'anadaitornada')) }}  
        {{ Form::label('anadaitornada','Anada i tornada', array('style'=>'font-weight:normal;')) }} 
        
    </div>   
    <p/>
    <div class="form-group" style="display:inline-block;margin-right: 17px;">
        {{ Form::label('andaData', 'Anada') }}
        <div id="anadaData">
            <div id="sandbox-container" style="width:298px;">
                <div class="input-group date">
                    <input readonly type="text" class="form-control" style="cursor: inherit;" value="{{date('d-m-Y')}}"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                </div>
            </div>
        </div>
        <div id="anadaPeriodic" style="display:none">
            {{Form::checkbox('aDl','Dl', false, array('id' => 'aDl'))}} {{Form::label('aDl','Dl')}}&nbsp;
            {{Form::checkbox('aDm','Dm', false, array('id' => 'aDm'))}} {{Form::label('aDm','Dm')}}&nbsp;
            {{Form::checkbox('aDx','Dx', false, array('id' => 'aDx'))}} {{Form::label('aDx','Dx')}}&nbsp;
            {{Form::checkbox('aDj','Dj', false, array('id' => 'aDj'))}} {{Form::label('aDj','Dj')}}&nbsp;
            {{Form::checkbox('aDv','Dv', false, array('id' => 'aDv'))}} {{Form::label('aDv','Dv')}}&nbsp;
            {{Form::checkbox('aDs','Ds', false, array('id' => 'aDs'))}} {{Form::label('aDs','Ds')}}&nbsp;
            {{Form::checkbox('aDg','Dg', false, array('id' => 'aDg'))}} {{Form::label('aDg','Dg')}}&nbsp;
        </div>
    <p/>
            {{ Form::label('anadaHora', 'Hora') }}
        <div id="anadaHora">
            <div class="input-group bootstrap-timepicker" style="width: 206px;">
                <input id="inAnadaHora" type="text" class="form-control">
                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
            </div>
     
            <script type="text/javascript">
                $('#inAnadaHora').timepicker();
            </script>
        </div>
    </div>
    <div class="form-group" style="display:inline-block;">
        <div id="tornada" style="display:none;">
            {{ Form::label('tornadaData', 'Tornada') }}
            <div id="tornadaData">
                <div id="sandbox-container" style="width:298px;">
                    <div class="input-group date">
                        <input readonly type="text" class="form-control" style="cursor: inherit;" value="{{date('d-m-Y')}}"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                    </div>
                </div>
            </div>
            <div id="tornadaPeriodic" style="display:none">
                {{Form::checkbox('tDl','Dl', false, array('id' => 'tDl'))}} {{Form::label('tDl','Dl')}}&nbsp;
                {{Form::checkbox('tDm','Dm', false, array('id' => 'tDm'))}} {{Form::label('tDm','Dm')}}&nbsp;
                {{Form::checkbox('tDx','Dx', false, array('id' => 'tDx'))}} {{Form::label('tDx','Dx')}}&nbsp;
                {{Form::checkbox('tDj','Dj', false, array('id' => 'tDj'))}} {{Form::label('tDj','Dj')}}&nbsp;
                {{Form::checkbox('tDv','Dv', false, array('id' => 'tDv'))}} {{Form::label('tDv','Dv')}}&nbsp;
                {{Form::checkbox('tDs','Ds', false, array('id' => 'tDs'))}} {{Form::label('tDs','Ds')}}&nbsp;
                {{Form::checkbox('tDg','Dg', false, array('id' => 'tDg'))}} {{Form::label('tDg','Dg')}}&nbsp;
            </div>
            <p/>

                {{ Form::label('tornadaHora', 'Hora') }}
            <div id="tornadaHora">
                <div class="input-group bootstrap-timepicker" style="width: 206px;">
                    <input id="inTornadaHora" type="text" class="form-control">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                </div>
         
                <script type="text/javascript">
                    $('#inTornadaHora').timepicker();
                </script>
            </div>
        </div>
    </div>

    <!-- Checkbox per periodic-->
</div>