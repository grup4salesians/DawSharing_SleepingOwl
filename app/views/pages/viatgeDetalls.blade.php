@extends('layouts.default')
@section('title')
Detalls del Viatge
@stop
@section('content')
<?php $baseUrl = Config::get('constants.BaseUrl')."public"; ?>
<style>
    .perfilInfo {
        margin: 0 auto;
        width: 500px;
        text-align: center;
        display: block;
    }
    #vehicle i {
        margin-left: .47em;;
    }
</style>
<script src="http://maps.google.com/maps/api/js?libraries=places&region=sp&language=es&sensor=true"></script>
<script src="{{$baseUrl}}/js/ApiGoogleMaps_Prueba.js"></script>

<div style="min-height: 400px; margin: 0 10%;">
    <?php
    //$idViatge = 0;
    $ruta_id = 0;
    $usuari_id = 0;
    $vehicles_id = 0;
    $permissos = "NA";
    $data = 0;
    $preu = 999999999999;
    $seientsLliures = 0;
    $seientsTotals = 0;
    $duracio = 0;
    $ruta_inici = "";
    $ruta_fi = "";
    $creador = "";
    $fotoPerfil = "";
    $anys = 0;
    $membreDesde = "00/0/0000";
    $passatgers = "";
    try {
        //$idViatge = $_GET['idViatge'];
        $infoViatge = Viatge::where('id', $idViatge)->get();
        $ruta_id = $infoViatge[0]->ruta_id;
        $usuari_id = $infoViatge[0]->usuari_id;
        $vehicles_id = $infoViatge[0]->vehicles_id;

        $infoRuta = Ruta::where('id', $ruta_id)->get();
        $ruta_inici = $infoRuta[0]->inici_ruta;
        $ruta_fi = $infoRuta[0]->fi_ruta;

        $infoUsuari = Usuari::where('id', $usuari_id)->get();
        $creador = $infoUsuari[0]->nom;
        $fotoPerfil = $infoUsuari[0]->foto;
        $data_naixement = $infoUsuari[0]->data_naixement;
        $dataNow = date("Y-m-d H:i:s");
        $anys = strtotime($dataNow) - strtotime($data_naixement);
        $anys = $anys / (60 * 60 * 24 * 365);
        $anys = floor($anys);
        $membreDesde = $infoUsuari[0]->fecha_inscripcion;

        $permissos = $infoViatge[0]->permissos;
        $data = $infoViatge[0]->data;
        $preu = $infoViatge[0]->preu;
        $seientsLliures = $infoViatge[0]->numSeientRestant;
        $seientsTotals = $infoViatge[0]->numSeientDisponible;
        $duracio = $infoViatge[0]->duracio;

        $passatgers = Passatger::where('viatge_id', $idViatge)->where('estat', '=', 'acceptat')->get();
    } catch (Exception $e) {
        //echo $e;
        echo '<div class="alert alert-danger">';
        echo 'Error en el viatge!';
        echo '</div>';
    }

    try {
        $newPassatger = $_GET['newPassatger'];
        
    } catch (Exception $e) {
        $newPassatger = "";
    }

    //$comentari = "Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. ";
    //$sollicitud = "Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. Testo testo tes testotes tes te testo testo. "; 
    //$descUser = "Bla bla blblablala blabalba bl, blalabla blab abla blalba blab alba bla blabalab albab albalalb ablalbalb abla balblalb ablaba ñ. alb alba lababla blab alb ablaalal abla a.";

    function permissos($p_permissos) {
        $codi = "";
        $arrayPermissos = explode(";", $p_permissos);

        foreach ($arrayPermissos as $key => $value) {
            //Equipatge gran;Fumar;Animals;Menjar i/o beure

            switch ($value) {
                case 'Equipatge gran':
                    # code...
                    $codi = $codi . '<i class="fa fa-suitcase fa-5x" title="' . $value . '"></i>';
                    break;
                case 'Fumar':
                    # code...
                    $codi = $codi . '<i class="fa fa-magic fa-5x" title="' . $value . '"></i>';
                    break;
                case 'Animals':
                    # code..
                    $codi = $codi . '<i class="fa fa-paw fa-5x" title="' . $value . '"></i>';
                    break;
                case 'Menjar i/o beure':
                    # code...
                    $codi = $codi . '<i class="fa fa-cutlery fa-5x" title="' . $value . '"></i>';
                    break;

                default:
                    # code...

                    break;
            }
        }
        echo $codi;
    }
    ?>

    <h1>Viatge entre <span id="searchTextField">{{ $ruta_inici }}</span> i <span id="searchTextFieldFin">{{ $ruta_fi }}</span> amb {{$creador}} ({{ $duracio }} min)</h1>
    <div>
        <div class="fleft" style="width: 66.6%; margin-bottom:50px; z-index:1;">
            <div id="map_canvas" style="height: 350px; background-color:grey; margin-bottom:5px;"></div>
            <div>
                <!--<div id="vehicle" class="fright" style="height:130px;">
                        <img width="200" src="img/cache/original/vehicles/{{-- $fotoVehicle --}}" />
                </div>-->
                <div id="vehicle" class="fright clear"><?php permissos($permissos); ?></div>

                <h3>{{ $data }}</h3> <br />
                {{ Form::label('Pagament en efectiu') }}<br />
                {{ Form::label('inici', $ruta_inici) }}<br />
                {{ Form::label('fi', $ruta_fi) }}<br />
                <!--
                                                        <div class="clear">
                                                                {{-- Form::label('comentari', 'Comentari:') --}}<br />
                                                                {{-- Form::label('comentari', $comentari, array('style' => 'solid: 1px black; background-color:lightgrey;')) --}}<br />
                                                        </div>
                                                        </br>
                                                        <div>
                                                                {{-- Form::label('sollicitud', 'Sol·licitud:') --}}<br />
                                                                {{-- Form::label('comentari', $sollicitud, array('style' => 'solid: 1px black; background-color:lightgrey;')) --}}<br />
                                                        </div>
                -->
            </div>
            <?php 
                try {
                    $estat = Passatger::where('viatge_id', $idViatge)->where('usuari_id', Auth::user()->id)->get();
                    $estat = $estat[0]->estat;
                } catch (Exception $e) {
                    $estat = "mmm";
                }
                try {
                    $seientsRestants = Viatge::where('id', $idViatge)->get();
                    $seientsRestants = $seientsRestants[0]->numSeientRestant;
                } catch (Exception $e) {
                    $seientsRestants = 0;
                }
            ?>
            
            @if($estat == "acceptat" || $estat == "creador")
                {{ Form::button('Ja ets passatger', array('disabled','data-toggle' => 'modal','data-target' => '.bs-example-modal-sm', 'class' => '', 'style' => 'opacity: 0.5;font-size: 1.6em;font-weight: bold;margin-top: .5em;text-transform:uppercase;height: 62px; 
                background-color: #44c767;
                border-radius: 5px;
                border: 1px solid #44c767;
                display: inline-block;
                color: #ffffff;
                font-family: Arial;
                padding: 8px;
                text-decoration: none;
                width: 100%;')) }}
            @elseif($estat == NULL || $estat == "pendent")
                {{ Form::button('Pendent de confirmació', array('disabled','data-toggle' => 'modal','data-target' => '.bs-example-modal-sm', 'class' => '', 'style' => 'opacity: 0.5;font-size: 1.6em;font-weight: bold;margin-top: .5em;text-transform:uppercase;height: 62px; 
                background-color: #ec971f;
                border-radius: 5px;
                border: 1px solid #ec971f;
                display: inline-block;
                color: #ffffff;
                font-family: Arial;
                padding: 8px;
                text-decoration: none;
                width: 100%;')) }}
            @elseif(!$seientsRestants)
                {{ Form::button('Tancat', array('disabled','data-toggle' => 'modal','data-target' => '.bs-example-modal-sm', 'class' => '', 'style' => 'opacity: 0.5;font-size: 1.6em;font-weight: bold;margin-top: .5em;text-transform:uppercase;height: 62px; 
                background-color: #d9534f;
                border-radius: 5px;
                border: 1px solid #d9534f;
                display: inline-block;
                color: #ffffff;
                font-family: Arial;
                padding: 8px;
                text-decoration: none;
                width: 100%;')) }}
            @elseif($estat == "mmm")
                {{ Form::button('Sol·licitar plaça', array('data-toggle' => 'modal','data-target' => '.bs-example-modal-sm', 'class' => 'Registre_button', 'style' => 'font-size: 1.6em;font-weight: bold;margin-top: .5em;text-transform:uppercase;height: 62px;')) }}
            @elseif($estat == "denegat")
                {{ Form::button('Denegat', array('disabled','data-toggle' => 'modal','data-target' => '.bs-example-modal-sm', 'class' => '', 'style' => 'opacity: 0.5;font-size: 1.6em;font-weight: bold;margin-top: .5em;text-transform:uppercase;height: 62px; 
                background-color: #d9534f;
                border-radius: 5px;
                border: 1px solid #d9534f;
                display: inline-block;
                color: #ffffff;
                font-family: Arial;
                padding: 8px;
                text-decoration: none;
                width: 100%;')) }}
            @else
                {{ Form::button('Tancat', array('disabled','data-toggle' => 'modal','data-target' => '.bs-example-modal-sm', 'class' => '', 'style' => 'opacity: 0.5;font-size: 1.6em;font-weight: bold;margin-top: .5em;text-transform:uppercase;height: 62px; 
                background-color: #d9534f;
                border-radius: 5px;
                border: 1px solid #d9534f;
                display: inline-block;
                color: #ffffff;
                font-family: Arial;
                padding: 8px;
                text-decoration: none;
                width: 100%;')) }}
            @endif
            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content" style="margin-top: 50%;position: absolute;height: 160px;padding:15px;width: 449px;">
                        <h3>Vols demanar plaça per aquest viatge?</h3>
                        <div style="">
                        

                            {{"<a href='solicitud/$idViatge'>"}}
                                {{ Form::button('Sí', array('class' => 'btn btn-primary','style' => 'width:49%;height: 45px;')) }}
                            </a>
                            {{ Form::button('No', array('class' => 'btn btn-default', 'data-dismiss' => 'modal','style' => 'width:49%;height: 45px;')) }}
                        
						</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fright" style="width: 33.3%;">
            <div class="perfilInfo">
                <h3 style="margin: 0;">{{ $preu }}€ / Plaça</h3>
                <h4>{{ $seientsLliures }} lliures de {{ $seientsTotals }}</h4>
                <div style="" class="fotoPerfil"><img width="200" src="{{$baseUrl}}/img/cache/original/usuaris/{{ $fotoPerfil }}" /></div>
                <h3>{{$creador}}</h3>
                <h4>{{ $anys }}</h4>
                <!--{{-- Form::label('descUser', $descUser) --}}<p />-->
                <span>Membre des de {{ Form::label('membre', $membreDesde) }}</span>
            </div>
            <div class="passatgers" style="padding: 0 100px;">
                
                {{Form::label('Passatgers', 'Passatgers', array('style' => 'margin:5px 0 0 0;display:block;'))}}
                
                <?php 
		try {
                    foreach ($passatgers as $key => $value) {
                        # code...
                        $infoPassatger = Usuari::where('id', $value->usuari_id)->get();
                        $idPassatger = $infoPassatger[0]->id;
                        $fotoPassatger = (isset($infoPassatger[0]->foto)) ? $infoPassatger[0]->foto : "" ; 
                        $nomPassatger = (isset($infoPassatger[0]->nom)) ? $infoPassatger[0]->nom : "" ;
                        $nomPassatger = (isset($infoPassatger[0]->cognoms)) ? $nomPassatger." ".$infoPassatger[0]->cognoms : $nomPassatger ;
                        echo "<a href='#$idPassatger' style='display:inline-block; margin: 5px;";
                        if ($newPassatger == $idPassatger) {
                            echo "border: solid 4px #77DD77;";
                        }
                        echo "'><img alt='$nomPassatger' title='$nomPassatger' width='50' height='50' src='$baseUrl/img/cache/original/usuaris/$fotoPassatger' /></a>";
                    }

                } 
		catch(Exception $e){

		}
                ?>
            </div>
        </div>
        <div class="perfilInfo clear">

        </div>
    </div>
</div>
<div class="clear"></div>


@stop
