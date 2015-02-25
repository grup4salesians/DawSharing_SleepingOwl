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
<div id="cont-Pas-2" style="display: none" class="testtest PublicarViatge_CampsPas2 col-md-6">
    <div class="form-group">
        {{ Form::label('Freqüencia') }}</br>

        {{ Form::radio('frequencia', 'data_concreta') }}  
        {{ Form::label('data_concreta','Data Concreta', array('style'=>'font-weight:normal;')) }} </br>

        {{ Form::radio('frequencia', 'viatge_periodic') }}  
        {{ Form::label('viatge_periodic','Viatge Periòdic', array('style'=>'font-weight:normal;')) }} 
        
    </div>
    <div class="form-group">
        {{ Form::label('Tipus') }}</br>
        <div>
        {{ Form::radio('frequencia', 'anada', array('id'=>'anada')) }}  
        {{ Form::label('anada','Anada', array('style'=>'font-weight:normal;')) }} </br>
        </div>
        {{ Form::radio('frequencia', 'anada_i_tornada', array('id'=>'anada_i_tornada')) }}  
        {{ Form::label('anada_i_tornada','Anada i tornada', array('style'=>'font-weight:normal;')) }} 
        
    </div>   
    <div class="form-group">
        {{ Form::label('andaData', 'Anada') }}
        <div id="sandbox-container" style="width:230px;">
            <div class="input-group date">
                <input type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
            </div>
        </div>
    </div>
</div>