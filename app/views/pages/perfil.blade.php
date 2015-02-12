@extends('layouts.default')
@section('title')
Perfil
@stop
@section('content')
<div style="min-height: 400px; margin: 0% 10%;">
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
            cursor: pointer;
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
        .btn_a:hover {
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
    </style>
    
    <h1>El meu Perfil</h1>
    <div id="nav_perfil">
        <div class="active">
            <div id="dadesPersonals" class="btn_a">Dades personals</div>
        </div>
        <div>
            <div id="vehicles" class="btn_a">Els meus vehicles</div>
        </div>
        <div>
            <div id="perfilPublic" class="btn_a">Perfil públic</div>
        </div>
    </div>
    <div id="content_perfil" class="clear">
        <div id="cont-dadesPersonals" style="display: none" class="visible">
            <div class="col-sm-12 col-md-2">
                <img id="portrait" src="">
                <button id="portrait_edit" class="btn_b">Modificar foto</button>
            </div>
            <div class="col-sm-6 col-md-5">
                <div class="clear">
                    <span class="txt1">Nom</span>
                    <span class="txt2">Martinet</span>
                    <input type="text" style='display: none;'>
                </div>
                <div class="clear" style="padding-top: 25px;">
                    <span class="txt1">Cognoms</span>
                    <span class="txt2">Fill de puta</span>
                    <input type="text" style='display: none;'>
                </div>
                <div class="clear" style="padding-top: 25px;">
                    <span class="txt1">Nick</span>
                    <span class="txt2">M. FDP</span>
                    <select style='display: none;'>
                        <option>1</option>
                        <option>2</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-5">
                <div class="clear">
                    <span class="txt1">Sexe</span>
                    <span class="txt2">Home</span>
                    <select style='display: none;'>
                        <option>Home</option>
                        <option>Dona</option>
                    </select>
                </div>
                <div class="clear" style="padding-top: 25px;">
                    <span class="txt1">Data de naixement</span>
                    <span class="txt2">00/00/0000</span>
                    <input type="date" style='display: none;'>
                </div>
                <div class="clear" style="padding-top: 25px;">
                    <span class="txt1">Idioma preferit</span>
                    <span class="txt2">Català</span>
                    <input type="text" style='display: none;'>
                </div>
            </div>
            <div class="col-sm-12 col-md-offset-2 col-md-10" style="margin-top: -90px;">
                <div>
                    <span class="txt1" style="width: 10%;">Comentari</span>
                    <span class="comentari">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus vel libero ut dictum.
                        Proin pharetra sit amet nibh in venenatis. Pellentesque accumsan neque aliquam, ullamcorper orci ut, congue urna.
                        Ut a orci ut sapien volutpat maximus. Praesent ut nibh risus. Curabitur convallis laoreet nulla eget cursus.
                        Donec a neque ac ex congue egestas sit amet in dolor. Phasellus nibh libero, luctus ut dolor vel, volutpat lobortis dui.
                        Mauris commodo eu sapien sed elementum. Duis lobortis ex ac orci volutpat tempus. In eleifend quis tortor non efficitur.</span>
                </div>
            </div>
            <div style="clear: both;"></div>
        </div>
        <div id="cont-vehicles" style="display: none">
            Test2
            <div style="clear: both;"></div>
        </div>
        <div id="cont-perfilPublic" style="display: none">
            Test3
            <div style="clear: both;"></div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("#nav_perfil > div").children().click(function () {
                $("#nav_perfil > div").removeClass("active");
                
                var abc = $(this).attr("id");
                $(this).parent().addClass("active");
                
                $("#content_perfil").children().removeClass("visible");
                $("#cont-" + abc).addClass("visible");
            });
        });
    </script>    
</div>
@stop

