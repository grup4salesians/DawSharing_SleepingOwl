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
        .PublicarViatge_Alert{
            height: 65px;
            width: 540px;
            margin-top: 120px;
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
    <?php $arrayVehicles[$veh->vehicle] = $veh->vehicle; ?>
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
            <div id="Pas-3" class="btn_a">Pas 3 <p>Comentaris</p></div>
        </div>
    </div>

    @if ($errors->has())
    <div class="PublicarViatge_Alert alert alert-danger">
        @foreach ($errors->all() as $error)
        {{ $error }}<br>        
        @endforeach
    </div>
    @endif

    <div id="Error" class="PublicarViatge_Alert alert alert-danger">

    </div>

    {{ Form::open(array('url' => '/publicarViatge','id'=>'PublicarViatge_Form')) }}

    <div id="content_perfil" class="clear">

        @include('includes.publicarViatge.pas1')

        @include('includes.publicarViatge.pas2')

        @include('includes.publicarViatge.pas3')
        <div id="Mapa" class="PublicarViatge_Mapa col-md-6">
            <div id="map_canvas" class="PublicarViatge_MapCanvas"></div>
            <div id="MapaDistancia">
                <span class="PublicarViarge_Distancia">  Distància: </span> <div id="distance"> </div> <!--El div distance es para poner la distancia, lo calcula ApiGoogleViatgeDetalls.js-->
                <span class="PublicarViarge_Distancia">  Duració: </span> <div id="duration"> </div> 
                <input type="hidden" id="hidden_distance" name="hidden_distance">
                <input type="hidden" id="hidden_duration" name="hidden_duration">
            </div>
        </div>

        <div id="BotonesAdelanteAtras">
            <div id="Seguent" class="btn_a btn_c">Següent</div>
            {{ Form::button('Publicar Viatge',array('class'=> 'Registre_button','id'=>'Publicar'))}}
        </div>
    </div>
    <div style="clear:both;"></div>
    {{ Form::close() }}
    <script>
$(document).ready(function () {
    $("#Error").hide(); //Oculta el div error
    $("#Publicar").css("display", "none"); //Oculta el botón de publicar viage

    if ($("#meuVehicle option:selected").text() === "Afegir Vehicle") { //En caso de que no haya vehículos, muestra botón para añadirlos
        $("#meuVehicle").css("display", "none");
    }
    else {
        $("#btnAfegirVehicle").css("display", "none");
    }

    $("#Seguent").click(function () {
        var num_pestanyes = $("#content_perfil > .testtest").length;
        var current_div = $(".visible").attr("id");
        var num = current_div.split("-")[2];

        if (comprobacionForms(num)) {
            $("#Error").hide();
            eventoXunguArnau("Pas-" + (parseInt(num) + 1));
            if (num >= num_pestanyes - 1) {
                $("#Seguent").css("display", "none");
                $("#Publicar").css("display", "block");
            }
        }
        else {
            $("#Error").show();
            $("#Error").html("No has introduit les dades. <br/> Revisa que les hagis introduit correctament.");
        }

    });

    $("#Publicar").click(function () { //Cuando se le da al botón de publicar, comprueba que los datos estén llenos, y en caso afirmativo hace el submit del form
        if (comprobacionForms(3)) {
            //$("#PublicarViatge_Form").submit();

            $("#PublicarViatge_Form").submit();

        } else {
            $("#Error").show();
        }
    });

    function eventoXunguArnau(id) {
        $("#nav_perfil > div").removeClass("active");
        $("#" + id).parent().addClass("active");
        $("#content_perfil > div").removeClass("visible");
        $("#cont-" + id).addClass("visible");
    }

    function comprobacionForms(num) {   //switch case para que valide según el número de paso que estamos.
        var dadesOk = false;
        switch (parseInt(num)) {
            case 1:
                dadesOk = ComprobarItemsForm1();
                break;
            case 2:
                dadesOk = ComprobarItemsForm2();
                break;
            case 3:
                dadesOk = ComprobarItemsForm3();
                break;
        }
        return dadesOk;
    }
    function ComprobarItemsForm1() {  //Comprueba que estén llenos los valores del paso 1
        if (($("#searchTextField").val()) && ($("#searchTextFieldFin").val()) && ($("#meuVehicle option:selected").text() !== "Afegir Vehicle")) {
           
            var distancia = document.getElementById("distance").innerHTML;
            var duracio = document.getElementById("duration").innerHTML;

            $("#hidden_distance").val(distancia);
            $("#hidden_duration").val(duracio);
            
            return true;
        }
    }
    function ComprobarItemsForm2() { //Comprueba que estén llenos los valores del paso 2
        var anadaPeriodic = 0;
        var tornadaPeriodic = 0;
        if ($("#viatge_periodic").is(':checked')) {
            if ($("#anadaitornada").is(':checked')) {
                $('#tornadaPeriodic input:checked').each(function () {
                    var sThisVal = (this.checked ? "1" : "0");
                    tornadaPeriodic += parseInt(sThisVal);
                });
            }
            $('#anadaPeriodic input:checked').each(function () {
                var sThisVal = (this.checked ? "1" : "0");
                anadaPeriodic += parseInt(sThisVal);
            });
            if ((($("#anadaitornada").is(':checked') && tornadaPeriodic > 0)) && (($("#viatge_periodic").is(':checked') && anadaPeriodic > 0))) {
                return true;
            }
            else if (($("#viatge_periodic").is(':checked') && anadaPeriodic > 0) && (!$("#anadaitornada").is(':checked'))) {
                return true;
            }
            else {
                return false;
            }

        }
        else {
            return true;
        }
    }
    function ComprobarItemsForm3() { //Comprueba que estén llenos los valores del paso 3
        if (($("#numplaces").val()) && ($("#valorplaça").val())) {
            return true;
        }
    }
});
    </script>    
</div>
@stop

