@extends('layouts.default')
@section('title')
Perfil
@stop
@section('content')
<div>
    <style>
        .visible {
            display: block !important;
        }
        .btn-a {
            background-color: white;
            display: inline-block;
            cursor: pointer;
            color: #ffffff;
            font-family: arial;
            font-size: 17px;
            padding: 16px 31px;
            text-decoration: none;
            color: black;
        }
        .btn-a:hover {
            background-color: #eee;
            cursor: pointer;
        }
        .active .btn-a {
            background-color: #46cd4d;
        }
/*        .active .btn-a:hover {
            cursor: pointer;
        }*/
        

    </style>
    <h1>El meu Perfil</h1>
    <div id="nav_perfil">
        <div class="active">
            <div id="dadesPersonals" class="btn-a">Dades personals</div>
        </div>
        <div>
            <div id="vehicles" class="btn-a">Els meus vehicles</div>
        </div>
        <div>
            <div id="perfilPublic" class="btn-a">Perfil públic</div>
        </div>
    </div>
    <div id="content_perfil">
        <div id="cont-dadesPersonals" style="display: none" class="visible">
            Test 
        </div>
        <div id="cont-vehicles" style="display: none">
            Test2
        </div>
        <div id="cont-perfilPublic" style="display: none">
            Test3
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("#nav_perfil > div").children().click(function () {
                var abc = $(this).attr("id");
                $(this).parent().addClass("active");
                
                $("#content_perfil").children().removeClass("visible");
                $("#cont-" + abc).addClass("visible");
            });
        });
    </script>    
</div>
@stop

