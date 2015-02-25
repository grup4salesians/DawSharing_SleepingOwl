<style>
    .Pas3Labels{
        float: left;
        width: 300px;
    }
    #linea{
        border-top:1px solid black;
        width: 445px;
    }
</style>
<div id="cont-Pas-3" style="display: none" class="testtest">
    <?php
    $permissos = Caracteristiques::orderBy('id', 'desc')->get();
    $permis = explode(";", $permissos[0]->permisosViatges);
    $i=0;
    foreach ($permis as &$valor) {
        ?>
        <div class="form-group">
            <div class="Pas3Labels">{{ Form::label($valor, $valor) }} </div>
            {{ Form::radio('Datos_'+$i, $valor+'_si') }}
            {{ Form::label('Si', 'Si') }}
            {{ Form::radio('Datos_'+$i, $valor+'_no') }}
            {{ Form::label('No', 'No') }}
            
        </div>
        <?php
        $i=$i+1;
    }
    ?>
    <div id="linea"></div>
    {{ Form::label('NumPlaces', 'Número de places:') }}
    
    {{ Form::label('Comentaris', 'Comentaris:') }}
    <div style="clear: both;"></div>
</div>