@extends('layouts.default')
@section('title')
Publicar viatge
@stop
@section('content')
<div style="min-height: 400px; margin: 0% 10%;">
    <script src="http://maps.google.com/maps/api/js?libraries=places&region=sp&language=es&sensor=true"></script>
    <script src="js/ApiGoogleMaps_Prueba.js"></script>

    <style>
        .visible {
            display: block !important;
            position: relative;
            height: auto;
        }
        .btn_a {
            background-color: white;
            display: inline-block;
            color: #fff;
            font-family: arial;
            font-size: 17px;
            padding: 16px 31px;
            text-decoration: none;
            color: black;
        }
        .btn_b {
            background-color: #46cd4d;
            display: inline-block;
            cursor: pointer;
            color: #fff;
            font-family: arial;
            font-size: 17px;
            padding: 8px 30px;
            text-decoration: none;
            width: 80%;
        }
        .btn_c:hover {
            background-color: #eee;
            cursor: pointer;
        }
        .active .btn_a {
            background-color: #46cd4d;
            color: #fff;
        }
        #nav_perfil > div {
            float: left;
        }
        #content_perfil {
            width: 100%;
            position: relative;  
            padding-top: 30px;
        }
        #portrait {
            width: 180px;
            height: 180px;
            background-color: #eee;
            margin-bottom: 15px;
        }
        .txt1 {
            float: left;
            font-weight: bold;
            color: #000;
            text-transform: capitalize;
        }
        .txt2 {
            float: right;
            color: #999;
        }
        .comentari {
            float: left;
            width: 90%;
            height: 100px;
        }
        .clear {
            clear: both;
        }

        /********** BOTONS****************/
        #BotonesAdelanteAtras {
            width: 450px;
            margin-top: 20px;
            margin-bottom: 60px;
            margin-left: 10px;
        }
        #BotonesAdelanteAtras div {
            float: right;
            margin-top: -25px;
        }

        /************ FI BOTONS**************/

        /*************** PAS 1 ******************/
        .PublicarViatge_MapCanvas{
            height: 300px; 
            background-color:grey; 
            margin-bottom:5px;
        }
        .PublicarViarge_Titols_OrigenDestinacio{
            font-size: large;
            font-weight: bold;
            float:left;
            margin-right: 5px;
        }
        .PublicarViarge_Distancia{
            margin-right: 10px;
            float: LEFT;
        }
        /************** FI PAS 1 *****************/

        .PublicarViatge_Elementos{
            width: 300px;
            float: right;
        }
    </style>

    <?php
    $origen = Input::get('PublicarViatgeOrigen');
    $desti = Input::get('PublicarViatgeDesti');
    ?>

    <?php
    $vehicles = ViewVehiclesUsuari::where('usuaris_id', Auth::user()->id)->orderBy('id', 'desc')->get();
    if (sizeof($vehicles) == 0) {
        $arrayVehicles[] = "Afegir Vehicle";
    }
    ?>
    @foreach($vehicles as $key => $veh)
    <?php $arrayVehicles[] = $veh->vehicle; ?>
    @endforeach

    <h1>Publicar Viatge</h1>
    <div id="nav_perfil">
        <div class="active">
            <div id="Pas-1" class="btn_a">Pas 1 <p>On vols anar?</p></div>
        </div>
        <div>
            <div id="Pas-2" class="btn_a">Pas 2 <p>Quan hi vols anar?</p></div>
        </div>
        <div>
            <div id="Pas-3" class="btn_a">Pas 3</div>
        </div>
    </div>
    {{ Form::open(array('url' => '/publicarViatge')) }}

    <div id="content_perfil" class="clear">
       
            @include('includes.publicarViatge.pas1')

            @include('includes.publicarViatge.pas2')

            @include('includes.publicarViatge.pas3')
            <div id="Mapa" class="PublicarViatge_Mapa col-md-6">
                <div id="map_canvas" class="PublicarViatge_MapCanvas"></div>
                <div id="MapaDistancia">
                    <span class="PublicarViarge_Distancia">  Distància: </span> <div id="distance"> </div> <!--El div distance es para poner la distancia, lo calcula ApiGoogleViatgeDetalls.js-->
                </div>
            </div>

            <div id="BotonesAdelanteAtras">
                <div id="Seguent" class="btn_a btn_c">Següent</div>
                {{ Form::submit('Publicar Viatge',array('class'=> 'Registre_button','id'=>'Publicar'))}}
            </div>
    </div>
    <div style="clear:both;"></div>
    {{ Form::close() }}
    <script>
$(document).ready(function () {
    $("#Publicar").css("display", "none");  //Oculta el botón de publicar viage

    if ($("#meuVehicle option:selected").text() === "Afegir Vehicle") {
        $("#meuVehicle").css("display", "none");
    }
    else {
        $("#btnAfegirVehicle").css("display", "none");
    }

    function eventoXunguArnau(id) {
        $("#nav_perfil > div").removeClass("active");
        $("#" + id).parent().addClass("active");
        $("#content_perfil > div").removeClass("visible");
        $("#cont-" + id).addClass("visible");
    }
    $("#Seguent").click(function () {
        if (ComprobarItemsForm1()) {
            var num_pestanyes = $("#content_perfil > .testtest").length;
            var current_div = $(".visible").attr("id");
            var num = current_div.split("-")[2];
            eventoXunguArnau("Pas-" + (parseInt(num) + 1));
            if (num >= num_pestanyes - 1) {
                $("#Seguent").css("display", "none");
                $("#Publicar").css("display", "block");
            }
        }
        else {
            alert("No has llenado todos los campos");
        }
    });
    function ComprobarItemsForm1() {
        if (($("#searchTextField").val()) && ($("#searchTextFieldFin").val()) && ($("#meuVehicle option:selected").text() !== "Afegir Vehicle")) {
            return true;
        }
    }

});
    </script>    
</div>
@stop

