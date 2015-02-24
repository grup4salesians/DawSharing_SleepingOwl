<div id="cont-Pas-3" style="display: none" class="testtest">
    <?php
    $permissos = Caracteristiques::orderBy('id', 'desc')->get();
    $permis = explode(";", $permissos[0]->permisosViatges);

    foreach ($permis as &$valor) {
        ?>
        <div class="form-group">
            {{ Form::label($valor, $valor) }}
            {{ Form::radio('ArrayDatosPas3', $valor+'_si') }}
            {{ Form::label('Si', 'Si') }}
            {{ Form::radio('ArrayDatosPas3', $valor+'_no') }}
            {{ Form::label('No', 'No') }}
        </div>
        <?php
    }
    ?>
    <div style="clear: both;"></div>
</div>