@extends('layouts.default')
@section('title')
Publicar viatge
@stop
@section('content')
<div style="min-height: 400px; margin: 0% 10%;">
    <script src="http://maps.google.com/maps/api/js?libraries=places&region=sp&language=es&sensor=true"></script>
<script src="js/ApiGoogleViatgeDetalls.js"></script>
    <style>
        .visible {
            display: block !important;
            position: relative;
            height: auto;
            width: 100%;
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



        /*************** PAS 1 ******************/
/*        .PublicarViatge_CampsPas1{
            width: 350px;
            float: left;
        }*/
        .PublicarViatge_SelectVehicles{
            width: 175px;
            float: right;
        }

/*        .PublicarViatge_Mapa{
            float: right;
            width: 590px;
        }*/
        .PublicarViatge_MapCanvas{
            height: 300px; 
            background-color:grey; 
            margin-bottom:5px;
        }
        .PublicarViatge_Origen_Destinacio{
            width:100%;
            display: inline-block;
            margin: 15px;
        }
        .PublicarViarge_Titols_OrigenDestinacio{
            font-size: large;
            font-weight: bold;
            float:left;
            margin-right: 5px;
        }
        /************** FI PAS 1 *****************/
    </style>

    <h1>El meu Perfil</h1>
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
    {{ Form::open(array('url' => '/registre')) }}
    <div id="content_perfil" class="clear">
        <div id="cont-Pas-1" style="display: none" class="visible testtest">
            <div id="CampsPas1" class="PublicarViatge_CampsPas1 col-md-6">
                <div class="PublicarViatge_Origen_Destinacio">
                    <div id="Origen"  class ="PublicarViarge_Titols_OrigenDestinacio">Origen</div>
                    <div id="start" style="float:left;margin-top: 2px;">Barcelona</div>
                </div>
                <div class="form-group">
                    {{ Form::label('Soc', 'Sóc') }}
                    <div style="float:right;">
                    {{ Form::checkbox('chkPublicarViatgePas1_Conductor', true) }}   
                    {{ Form::label('Conductor', 'Conductor') }}
                    {{ Form::checkbox('chkPublicarViatgePas1_Passatger', true) }}     
                    {{ Form::label('Passatger', 'Passatger') }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('MeuVehicle', 'El meu vehicle') }}
                    {{ Form::select('meuVehicle', array('L' => 'Large', 'S' => 'Small'),null,array('class' => 'PublicarViatge_SelectVehicles')) }}   
                </div>
                <div class="form-group">
                    {{ Form::label('Origen', 'Origen') }}
                    {{ Form::text('origen', Input::old('origen'),array('class' => 'Registre_TextBox')) }} 
                </div>   
                <div class="form-group">
                    {{ Form::label('Destinacio', 'Destinació') }}
                    {{ Form::text('destinacio', Input::old('destinacio'),array('class' => 'Registre_TextBox')) }} 
                </div>
            </div>
            <div id="Mapa" class="PublicarViatge_Mapa col-md-6">
            <div class="PublicarViatge_Origen_Destinacio">
                <div id="Destinacio" class ="PublicarViarge_Titols_OrigenDestinacio">Destinacio</div>
                <div id="end" style="float:left;margin-top: 2px;">Girona</div>
            </div>
                <div id="map_canvas" class="PublicarViatge_MapCanvas">

                </div>
                <div id="MapaDistancia">
                </div>
            </div>
            <div style="clear: both;"></div>
        </div>


        <div id="cont-Pas-2" style="display: none" class="testtest">
            Test2
            <div style="clear: both;"></div>
        </div>
        <div id="cont-Pas-3" style="display: none" class="testtest">
            Test3
            <div style="clear: both;"></div>
        </div>

        <style>
            #BotonesAdelanteAtras {
                width: 100%;
                margin-top: 20px;
            }
            #BotonesAdelanteAtras div {
                float: left;
                margin-right: 20px;
            }

        </style>
        <div id="BotonesAdelanteAtras">
            <div id="Anterior" class="btn_a btn_c" style="display: none;">Anterior</div>
            <div id="Seguent" class="btn_a btn_c">Següent</div>
            {{ Form::submit('Publicar Viatge',array('class'=> 'Registre_button'))}}
        </div>


    </div>
    {{ Form::close() }}
    <script>
        $(document).ready(function () {

            function eventoXunguArnau(id) {
                $("#nav_perfil > div").removeClass("active");
                $("#" + id).parent().addClass("active");

                $("#content_perfil > div").removeClass("visible");
                $("#cont-" + id).addClass("visible");
            }

            $("#Anterior").click(function () {
                var current_div = $(".visible").attr("id");
                var num = current_div.split("-")[2];

                eventoXunguArnau("Pas-" + (parseInt(num) - 1));

                if (num <= 2) {
                    $("#Anterior").css("display", "none");

                } else {
                    $("#Seguent").css("display", "block");
                }
            });
            $("#Seguent").click(function () {
                var num_pestanyes = $("#content_perfil > .testtest").length;

                var current_div = $(".visible").attr("id");
                var num = current_div.split("-")[2];

                eventoXunguArnau("Pas-" + (parseInt(num) + 1));

                if (num >= num_pestanyes - 1) {
                    $("#Seguent").css("display", "none");
                } else {
                    $("#Anterior").css("display", "block");
                }
            });


        });
    </script>    
</div>
@stop

