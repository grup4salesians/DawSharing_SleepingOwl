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
            margin-top: 3px;
            float: left;
            font-weight: bold;
            color: #000;
            text-transform: capitalize;
            width: 30%;
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
        #cont-dadesPersonals select {
            border-radius: 0px;
            -webkit-border-radius: 0px;
            border-color: rgb(170, 170, 170);
            float: right;
            height: 26px;
            padding-top: 0px;
            padding-bottom: 0px;
        }
        #cont-dadesPersonals input, #cont-dadesPersonals select {
            width: 70%;
            padding-left: 10px;
        }
        #canviarEmail input, #canviarPass input, #canviarTlf input {
            display: none;
            float: left;
            width: 100%;
            margin-bottom: 8px
        }
        #canviarEmail > .alerta {
            color: red;
            display: none;
        }
        .cancelar {
            display: none;
        }
        .pointer:hover {
            cursor: pointer;
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


    //echo "<script>console.log(JSON.stringify(" . $userdata . "))</script>";
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
                                    <select style='display: none;'>
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
                <div id="canviarEmail" class="col-sm-4">
                    <h3>Email</h3>
                    <p id="correu"><?php echo $userdata->correu ?></p>
                    <input id="inputEmail" type="email" value="" placeholder="Nou email">
                    <input id="inputEmail2" type="email" value="" placeholder="Confirmar nou email">
                    <p class="alerta">Els correus no coincideixen</p>
                    <a class="pointer canviar">Canviar</a>
                    <a class="pointer cancelar">Cancel·lar</a>
                </div>
                <div id="canviarPass" class="col-sm-4">
                    <h3>Contrasenya</h3>
                    <p id="contrasenya">********</p>
                    <input id="inputPassOld" type="password" value="" placeholder="Contrasenya antiga">
                    <input id="inputPassNew" type="password" style='display: none; float: left; width: 100%;' value="" placeholder="Contrasenya nova">
                    <input id="inputPassNew2" type="password" style='display: none; float: left; width: 100%;' value="" placeholder="Confirmar la nova contrasenya">
                    <p class="alerta">Les contrasenyes no coincideixen</p>
                    <a class="pointer canviar">Canviar</a>
                    <a class="pointer cancelar">Cancel·lar</a>
                </div>
                <div id="canviarTlf" class="col-sm-4">
                    <h3>Telèfon</h3>
                    <p id="telefon"><?php echo $userdata->telefon ?></p>
                    <input id="inputTlf" type="tel" style='display: none; float: left; width: 100%;' value="" placeholder="Nou telèfon">
                    <a class="pointer canviar">Canviar</a>
                    <a class="pointer cancelar">Cancel·lar</a>
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
            <?php
            $uservehicles = VehiclesUsuari::where('usuaris_id', Auth::user()->id)->orderBy('id', 'desc')->get();

            for ($a = 0; $a < count($uservehicles); $a++) {
                $idvehicle = $uservehicles[$a]["vehicle_id"];

                $vehicle = Vehicle::where('id', $idvehicle)->orderBy('id', 'desc')->get();
                ?>
                <div class="fila">
                    <div class="col-sm-8">
                        <div>
                            <?php
                            if ($vehicle[0]["custom_marca"] != "") {
                                echo ($vehicle[0]["custom_marca"] . " " . $vehicle[0]["custom_model"]);
                            } else {
                                echo "Sense Especificar";
                            }
                            ?>
                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
                <?php
//                echo "<script>console.log(JSON.stringify(" . $vehicle . "))</script>";
            }
            ?>

            <?php for ($a = 0; $a < count($userdata); $a++): ?>

            <?php endfor; ?>
            <div style="clear: both;"></div>
        </div>
        <div id="cont-perfilPublic" style="display: none;">
            @include('includes.perfilViatges')
            <div style="clear: both;"></div>
        </div>
        <div class="clear"></div>
    </div>
    <script>
        $(document).ready(function () {

            // Menu
            $("#nav_perfil > div").children().click(function () {
                $("#nav_perfil > div").removeClass("active");

                var abc = $(this).attr("id");
                $(this).parent().addClass("active");

                $("#content_perfil").children().removeClass("visible");
                $("#cont-" + abc).addClass("visible");
            });

            // Dades Usuari
            $("#modificar_dades").click(function () {
                if ($("#form_dadesUsuari").hasClass("mod")) {

                    $("#form_dadesUsuari input, #form_dadesUsuari select").css("display", "none");
                    $("#form_dadesUsuari .txt2").css("display", "block");

                    $("#form_dadesUsuari").removeClass("mod");

                    //insert
                } else {
                    $("#form_dadesUsuari input, #form_dadesUsuari select").css("display", "block");
                    $("#form_dadesUsuari .txt2").css("display", "none");

                    $("#form_dadesUsuari").addClass("mod");
                }

            });

            $("#canviarEmail .canviar").on("click", function () {
                canviarExtres("canviarEmail")
            });
            $("#canviarPass .canviar").on("click", function () {
                canviarExtres("canviarPass")
            });
            $("#canviarTlf .canviar").on("click", function () {
                canviarExtres("canviarTlf")
            });

            $("#canviarEmail .cancelar").on("click", function () {
                tancar("canviarEmail")
            });
            $("#canviarPass .cancelar").on("click", function () {
                tancar("canviarPass")
            });
            $("#canviarTlf .cancelar").on("click", function () {
                tancar("canviarTlf")
            });

            function tancar(id) {
                id = "#" + id;

                if (id === "#canviarEmail") {
                    $(id + " #correu").css("display", "block");
                } else if (id === "#canviarPass") {
                    $(id + " #contrasenya").css("display", "block");
                } else if (id === "#canviarTlf") {
                    $(id + " #telefon").css("display", "block");
                }

                $(id + " .alerta").css("display", "none");
                $(id + " input").css("display", "none").val("");
                $(id + " .cancelar").css("display", "none");

                $(id).removeClass("mod");
            }

            function canviarExtres(id) {
                id = "#" + id;

                if ($(id).hasClass("mod")) {

                    if (id === "#canviarEmail") {
                        // if email = "" or email != email2
                        if (($("#inputEmail").val() === "") || ($("#inputEmail").val() !== $("#inputEmail2").val())) {
                            $(id + " p").css("display", "none");
                            $(id + " input").css("display", "block");

                            $(id).addClass("mod");

                            $(id + " .alerta").css("display", "block");
                        } else {
                            $(id + " .alerta").css("display", "none");

                            var correu = $("#inputEmail").val();

                            $.ajax({
                                type: 'POST',
                                url: '<?php echo Config::get('constants.BaseUrl') ?>app/views/others/perfilQueries.php',
                                data: {id: '<?php echo $userdata->id ?>', email: correu},
                                success: function (data) {
                                    $("#correu").html(correu);
                                    
                                    $(id + " p").css("display", "block");
                                    $(id + " input").css("display", "none");

                                    $(id).removeClass("mod");
                                },
                                error: function (data) {
                                    console.log("Error: " + data);

                                }
                            });

                            $(id + " input").val("");
                        }

                    } else if (id === "#canviarPass") {
                        if ($("#inputPassNew").val() === $("#inputPassNew2").val()) {
                            $.ajax({
                                type: 'POST',
                                url: '<?php echo Config::get('constants.BaseUrl') ?>app/views/others/perfilQueries.php',
                                data: {comparar_pass: $("#inputPassOld").val(), id: '<?php echo $userdata->id ?>', pass: $("#inputPassNew").val()},
                                success: function (data) {
                                    if (data === "pass_updated") {
                                        $(id + " p").css("display", "block");
                                        $(id + " input").css("display", "none");
                                        $(id + " .alerta").css("display", "none");
                                    }
                                    else {
                                        console.log(data);
                                    }
                                },
                                error: function (data) {
                                    console.log("Ajax error: " + data);
                                    if (confirm("Hi ha hagut un problema inesperat!") === true) {
                                        location.reload();
                                    } else {
                                        location.reload();
                                    }
                                }
                            });
                        } else {
                            $(id + " .alerta").css("display", "block");
                        }
                    } else if (id === "#canviarTlf") {
                        // if email = "" or email != email2
                        if (($("#inputEmail").val() === "") || ($("#inputEmail").val() !== $("#inputEmail2").val())) {
                            $(id + " p").css("display", "none");
                            $(id + " input").css("display", "block");

                            $(id).addClass("mod");

                            $(id + " .alerta").css("display", "block");
                        } else {
                            $(id + " .alerta").css("display", "none");

                            var correu = $("#inputEmail").val();

                            $.ajax({
                                type: 'POST',
                                url: '<?php echo Config::get('constants.BaseUrl') ?>app/views/others/perfilQueries.php',
                                data: {id: '<?php echo $userdata->id ?>', email: correu},
                                success: function (data) {
                                    $("#correu").html(correu);
                                },
                                error: function (data) {
                                    console.log("Error: " + data);

                                }
                            });

                            $(id + " input").val("");
                        }
                    }

                } else {
                    $(id + " p").css("display", "none");
                    $(id + " input").css("display", "block");
                    $(id + " .cancelar").css("display", "block");

                    $(id).addClass("mod");
                }
            }
            // Ajuntar 3 funcions en una

        });
    </script>    
</div>
@stop

