@extends('layouts.default')
@section('title')
Perfil
@stop
@section('content')
<div style="min-height: 400px; margin: 0% 10%; margin-bottom: 160px;">
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
        .fila {
            width: 100%;
            display: table;
        }
        .txt1 {
            margin-bottom: 15px;
            float: left;
            font-weight: bold;
            color: #000;
            text-transform: capitalize;
        }
        .txt2 {
            margin-bottom: 15px;
            float: right;
            color: #999;
        }
        .comentari {
            float: left;
            width: 85%;
        }
        .clear {
            clear: both;
            float: none !important;
        }
        #portrait_edit {
            width: 100%;
            padding: 5px 25px;
        }
        #modificar_dades {
            width: 80%;
            max-width: 350px;
            min-width: 270px;
        }
        #cont-dadesPersonals > .fila{
            margin-bottom: 20px;
        }
        select {
            border-radius: 0px;
            -webkit-border-radius: 0px;
            border-color: rgb(170, 170, 170);
        }
        @media all and (min-width: 992px) {
            .col-comentari {
                 margin-top: -90px;
            }
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
        <div class="clear"></div>
    </div>
    
    <?php 
        $test = Usuari::where('id', Auth::user()->id)->orderBy('id', 'desc')->get(); 
        $userdata = $test[0];
        
        echo "<script>console.log(JSON.stringify(" . $userdata . "))</script>";
    ?>
     
    <div id="content_perfil">
        <div id="cont-dadesPersonals" style="display: none;" class="visible"> <!-- Dades Perfil -->
            <div class="fila">
                <div class="col-sm-12 col-md-3"> <!-- Foto Usuari -->
                    <img id="portrait" src="">
                    <button id="portrait_edit" class="btn_b">Modificar foto</button>
                    <form>
                        
                    </form>
                </div>
                <div class="col-sm-12 col-md-9"> <!-- Dades Usuari -->
                    <form id="form_dadesUsuari">
                        <div class="fila">
                            <div class="col-sm-6">
                                <div class="fila">
                                    <p class="txt1">Nom</p>
                                    <p class="txt2"><?php echo $userdata->nom ?></p>
                                    <input type="text" style='display: none; float: right;' value="<?php echo $userdata->nom ?>">
                                </div>
                                <div class="fila">
                                    <p class="txt1">Cognoms</p>
                                    <p class="txt2"><?php echo $userdata->cognoms ?></p>
                                    <input type="text" style='display: none; float: right;' value="<?php echo $userdata->cognoms ?>">
                                </div>
                                <div class="fila">
                                    <p class="txt1">Nick</p>
                                    <p class="txt2"><?php echo ($userdata->nom . " " . $userdata->cognoms); ?></p>
                                    <select style='display: none;'>
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="fila">
                                    <p class="txt1">Sexe</p>
                                    <p class="txt2"><?php echo $userdata->sexe ?></p>
                                    <select style='display: none; float: right;'>
                                        <option>Home</option>
                                        <option>Dona</option>
                                    </select>
                                </div>
                                <div class="fila">
                                    <p class="txt1">Data naix.</p>
                                    <p class="txt2"><?php echo explode(" ", $userdata->data_naixement)[0] ?></p>
                                    <input type="text" style='display: none; float: right;' value="<?php echo explode(" ", $userdata->data_naixement)[0] ?>">
                                </div>
                                <div class="fila">
                                    <p class="txt1">Idiomes</p>
                                    <p class="txt2"><?php echo $userdata->idioma ?></p>
                                    <input type="text" style='display: none; float: right;' value="<?php echo $userdata->idioma ?>">
                                </div>
                            </div>
                        </div>
                        <div class="fila">
                            <div class="col-sm-12" style="margin-top: 15px;">
                                <p class="txt1" style="width: 15%;">Comentari</p>
                                <p class="comentari">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus vel libero ut dictum.
                                    Proin pharetra sit amet nibh in venenatis. Pellentesque accumsan neque aliquam, ullamcorper orci ut, congue urna.
                                    Ut a orci ut sapien volutpat maximus. Praesent ut nibh risus. Curabitur convallis laoreet nulla eget cursus.
                                    Donec a neque ac ex congue egestas sit amet in dolor. Phasellus nibh libero, luctus ut dolor vel, volutpat lobortis dui.
                                    Mauris commodo eu sapien sed elementum. Duis lobortis ex ac orci volutpat tempus. In eleifend quis tortor non efficitur.
                                </p>
                            </div>
                        </div>
                        <div class="fila">
                            <div class="col-sm-12" style="margin-top: 15px; text-align: center;">
                            <button type="button" id="modificar_dades" class="btn_b">Modificar dades personals</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="fila">
                <div class="col-sm-4">
                    <h3>Email</h3>
                    <p><?php echo $userdata->correu ?></p>
                    <a href="#">Canviar</a>
                </div>
                <div class="col-sm-4">
                    <h3>Contrasenya</h3>
                    <p>********</p>
                    <a href="#">Canviar</a>
                </div>
                <div class="col-sm-4">
                    <h3>Telèfon</h3>
                    <p><?php echo $userdata->telefon ?></p>
                    <a href="#">Canviar</a>
                </div>
            </div>
            <div class="fila">
                <div class="col-sm-4 col-md-offset-8">
                    <p>Donar-me de baixa de la plataforma</p>
                    <a href="#">Donar-me de baixa de la plataforma</a>
                </div>
            </div>
        </div>
        <div id="cont-vehicles" style="display: none;">
            Test2
            <div style="clear: both;"></div>
        </div>
        <div id="cont-perfilPublic" style="display: none;">
            Test3
            <div style="clear: both;"></div>
        </div>
        <div class="clear"></div>
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
            
            $("#modificar_dades").click(function () {
                $("#form_dadesUsuari input, #form_dadesUsuari select").css("display", "block");
                $("#form_dadesUsuari .txt2").css("display", "none");
            })
        });
    </script>    
</div>
@stop

