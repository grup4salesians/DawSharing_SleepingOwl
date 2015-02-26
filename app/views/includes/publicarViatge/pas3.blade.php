<style>
    .Pas3Labels{
        float: left;
        width: 180px;
    }
    #linea{
        border-top:1px solid black;
        width: 445px;
    }
    .PublicarViatge_TextBox{
        width: 60px;
        margin-left: 40px;
    }
    .PublicarViatge_DivSI{
        margin-right: 70px;
    }
    .PublicarViatge_TexArea{
        margin: 0px;
        max-width: 430px;
        max-height: 250px;
        width: 430px;
        height: 110px;
    }
</style>
<div id="cont-Pas-3" style="display: none" class="PublicarViatge_CampsPas3 col-md-6 testtest">
    <?php
    $permissos = Caracteristiques::orderBy('id', 'desc')->get();
    $permis = explode(";", $permissos[0]->permisosViatges);
    $i = 0;
    foreach ($permis as &$valor) {
        ?>
        <div class="form-group">
            <div class="Pas3Labels">{{ Form::label($valor, $valor) }} </div>
            {{ Form::radio('Datos_'+$i, $valor+'_si',true) }}
            {{ Form::label('Si', 'Si',array('class'=>'PublicarViatge_DivSI')) }}
            {{ Form::radio('Datos_'+$i, $valor+'_no') }}
            {{ Form::label('No', 'No') }}

        </div>
        <?php
        $i = $i + 1;
    }
    ?>
    <div id="linea"></div>
    <div class="form-group">
        {{ Form::label('NumPlaces', 'Número de places:') }}
        {{ Form::text('NumPlaces', Input::old('NumPlaces'),array('class' => 'PublicarViatge_TextBox','id'=>'numplaces',"MAXLENGTH"=>1,'onKeyPress'=>'return numbersonly(this, event)')) }}
        {{ Form::text('EuroPlaça', Input::old('EuroPlaça'),array('class' => 'PublicarViatge_TextBox','id'=>'valorplaça',"MAXLENGTH"=>2,'onKeyPress'=>'return numbersonly(this, event)')) }}
        {{ Form::label('EuroPlaça', '€/Plaça') }}
    </div>
    {{ Form::label('Comentaris', 'Comentaris:',array('style'=>'width: 100%;')) }}
    {{ Form::textarea('comentaris',null,array('class'=>'PublicarViatge_TexArea')) }}
</div>

<SCRIPT TYPE="text/javascript">

    function numbersonly(myfield, e, dec)    {
        var key;
        var keychar;

        if (window.event)
            key = window.event.keyCode;
        else if (e)
            key = e.which;
        else
            return true;
        keychar = String.fromCharCode(key);
        if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13) || (key == 27))
            return true;
        else if ((("0123456789").indexOf(keychar) > -1))
            return true;
        else if (dec && (keychar == ".")){
            myfield.form.elements[dec].focus();
            return false;
        }
        else
            return false;
    }
</SCRIPT>