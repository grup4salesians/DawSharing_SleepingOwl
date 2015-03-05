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
            margin-top: 3px;
        }
        .comentari {
            float: left;
            width: 85%;
            margin-top: 3px;
            height: 150px;
            background-color: #f9f9f9;
            overflow: auto;
            padding: 5px 10px;
        }
        #comentari {
            float: left;
            width: 85%;
            margin-top: 3px;
            height: 150px;
            background-color: #f9f9f9;
            overflow: auto;
            display: none;
            margin-bottom: 10px;
            padding: 5px 10px;
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
        .alerta, .alerta2 {
            color: red;
            display: none;
        }
        .cancelar {
            display: none;
        }
        .pointer:hover {
            cursor: pointer;
        }
        .btnMod {
            padding: 2px 15px;
            font-size: 14px;
        }
        .btnFoto {
            padding: 2px 15px;
            font-size: 14px;
            background-color: rgb(49, 193, 240);
        }
        .btnDel {
            padding: 2px 15px;
            font-size: 14px;
            background-color: rgb(215, 32, 32);
        }
        .modificarCotxe {
            display: none;
        }
        .modificarCotxe > p {
            float: left;
            width: 30%;
            padding: 3px 3px;
            margin: 0px;
        }
        .modificarCotxe > input {
            float: right; 
            width: 70%;
        }
        .cancelarCotxe, .guardarCotxe  {
            width: 40%;
            margin: 0px 5%;
            float: left;
            padding: 1px 0px;
            margin-top: 15px;
        }
        .botonsCotxe {
            padding: 13px 0px;
        }
        #backdrop {
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            position: fixed;
            background-color: rgba(0, 0, 0, 0.5);
        }
        #backdrop > div {
            position: relative;
            width: 350px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20%;
            background-color: white;
            border: 1px solid rgb(146, 134, 134);
        }
        #backdrop > div > div > p {
            float: left;
            width: 30%;
            padding: 3px 3px;
            margin: 0px;
            margin-bottom: 5px;
        }
        #backdrop > div > div > input {
            float: right; 
            width: 70%;
            margin-bottom: 5px;
        }
        #backdrop > div > div > button {
            width: 39%;
            padding: 0px 20px;
            margin: 0px 5%;
            margin-top: 15px;
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
            <div id="perfilPublic" class="btn_a">Viatges</div>
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
                    <img id="portrait" src="data:image/jpeg;base64,<?php echo base64_encode( $userdata->foto ); ?>">
                    <!--<button id="portrait_edit" class="btn_b">Modificar foto</button>-->
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
                                    <input id="inputNom" type="text" style='display: none; float: right;' value="<?php echo $userdata->nom ?>">
                                </div>
                                <div class="fila">
                                    <p class="txt1">Cognoms</p>
                                    <p class="txt2"><?php echo $userdata->cognoms ?></p>
                                    <input id="inputCognoms" type="text" style='display: none; float: right;' value="<?php echo $userdata->cognoms ?>">
                                </div>
                                <div class="fila">
                                    <p class="txt1"></p>
                                    <p class="txt2"></p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="fila">
                                    <p class="txt1">Sexe</p>
                                    <p class="txt2"><?php echo $userdata->sexe ?></p>
                                    <select id="selectSexe" style='display: none;'>
                                        <option>Home</option>
                                        <option>Dona</option>
                                    </select>
                                </div>
                                <div class="fila">
                                    <p class="txt1">Data naix.</p>
                                    <p class="txt2"><?php echo explode(" ", $userdata->data_naixement)[0] ?></p>
                                    <input id="inputdataNaix" type="date" style='display: none; float: right; height: 26px;' value="<?php echo explode(" ", $userdata->data_naixement)[0] ?>">
                                </div>
                                <div class="fila">
                                    <p class="txt1">Idiomes</p>
                                    <p class="txt2"><?php echo $userdata->idioma ?></p>
                                    <input id="inputIdiomes" type="text" style='display: none; float: right;' value="<?php echo $userdata->idioma ?>">
                                </div>
                            </div>
                        </div>
                        <div class="fila">
                            <div class="col-sm-12" style="margin-top: 15px;">
                                <p class="txt1" style="width: 15%;">Comentari</p>
                                <p class="comentari"><?php echo $userdata->comentari ?></p>
                                <textarea id="comentari"><?php echo $userdata->comentari ?></textarea>
                            </div>
                        </div>
                        <div class="fila">
                            <div class="col-sm-12" style="margin-top: 15px; text-align: center;">
                                <button type="button" id="modificar_dades" class="btn_b" style="padding: 5px 0px;">Modificar dades personals</button>
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
                    <p class="alerta2">Contrasenya incorrecta</p>
                    <a class="pointer canviar">Canviar</a>
                    <a class="pointer cancelar">Cancel·lar</a>
                </div>
                <div id="canviarTlf" class="col-sm-4">
                    <h3>Telèfon</h3>
                    <p id="telefon"><?php echo $userdata->telefon ?></p>
                    <input id="inputTlf" type="tel" style='display: none; float: left; width: 100%;' value="" placeholder="Nou telèfon">
                    <p class="alerta">Omplir el camp telèfon</p>
                    <a class="pointer canviar">Canviar</a>
                    <a class="pointer cancelar">Cancel·lar</a>
                </div>
            </div>
<!--            <div class="fila">
                <div class="col-sm-4 col-md-offset-8">
                    <p>Donar-me de baixa de la plataforma</p>
                    <a href="#">Donar-me de baixa de la plataforma</a>
                </div>
            </div>-->
        </div>
        <div id="cont-vehicles" style="display: none;">
            <?php
            $uservehicles = VehiclesUsuari::where('usuaris_id', Auth::user()->id)->orderBy('id', 'desc')->get();

            for ($a = 0; $a < count($uservehicles); $a++) {
                $idvehicle = $uservehicles[$a]["vehicles_id"];

                $vehicle = Vehicle::where('id', $idvehicle)->orderBy('id', 'desc')->get();
                $matricula = VehiclesUsuari::where("vehicles_id", $idvehicle)->where("usuaris_id", Auth::user()->id)->get();
                ?>
                <div class="fila" style="padding-bottom: 10px;">
                    <div class="col-sm-6" style="padding: 22px 0px;">
                        <div class="col-sm-12">
                            <?php
                            if ($vehicle[0]["custom_marca"] != "") {
                                echo ("<p>" . $vehicle[0]["custom_marca"] . " " . $vehicle[0]["custom_model"] . "</p>");
                                echo ("<p>" . $vehicle[0]["combustio"] . " " . $matricula[0]["matricula"] . "</p>");
                            } else {
                                echo "Sense Especificar";
                            }
                            ?>
                        </div>
                    </div>
                    <div data-id="<?php echo $idvehicle ?>" class="col-sm-6 botonsCotxe cotxe-<?php echo $idvehicle ?>">
                        <button type="button" class="btn_b btnMod">Modificar</button>
                        <!--<button type="button" class="btn_b btnFoto">Foto</button>-->
                        <button type="button" class="btn_b btnDel">Eliminar</button>
                    </div>
                    <div data-id="<?php echo $idvehicle ?>" class="col-sm-6 modificarCotxe cotxe-<?php echo $idvehicle ?>">
                        <p>Marca: </p><input data-type="marca" type="text" value="<?php echo $vehicle[0]["custom_marca"] ?>"><br>
                        <p>Model: </p><input data-type="model" type="text" value="<?php echo $vehicle[0]["custom_model"] ?>"><br>
                        <p>Combustible: </p><input data-type="comb" type="text" value="<?php echo $vehicle[0]["combustio"] ?>"><br>
                        <p>Matricula: </p><input data-type="matr" type="text" value="<?php echo $matricula[0]["matricula"] ?>">
                        <button type="button" class="btn_b cancelarCotxe">Cancelar</button>
                        <button type="button" class="btn_b guardarCotxe">Guardar</button>
                    </div>
                </div>
                <?php
//                echo "<script>console.log(JSON.stringify(" . $vehicle . "))</script>";
            }
            ?>

            <div class="fila" style="padding-bottom: 10px;">
                <button type="button" class="btn_b afegirCotxe" style="width: 160px; padding: 5px 0px;">Nou Vehicle</button>
            </div>
            <div id="backdrop" style="display: none;">
                <div>
                    <div style="font-weight: bold; padding: 5px 15px; font-size: 20px;">Afegir nou vehicle: </div>
                    <div style="padding: 15px;">
                        <p>Tipus: </p><input data-type="tipus" type="text" value=""><br>
                        <p>Marca: </p><input data-type="marca" type="text" value=""><br>
                        <p>Model: </p><input data-type="model" type="text" value=""><br>
                        <p>Combustible: </p><input data-type="comb" type="text" value=""><br>
                        <p>Matricula: </p><input data-type="matr" type="text" value=""><br>
                        <p>Places: </p><input id="txtPlaces" data-type="places" type="number" value="">
                        <div class="alerta">Falten dades per omplir</div>
                        <button type="button" class="btn_b tancar">Cancelar</button>
                        <button type="button" class="btn_b crear">Crear</button>
                    </div>
                </div>
            </div>

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

            // Afegir cotxe
            $(".afegirCotxe").on("click", function () {
                $("#backdrop").css("display", "block");
            });

            $(".tancar").on("click", function () {
                $("#backdrop").css("display", "none");
            });

            $(".crear").on("click", function () {
                var marca   = $(this).siblings('[data-type="marca"]').val();
                var model   = $(this).siblings('[data-type="model"]').val();
                var comb    = $(this).siblings('[data-type="comb"]').val();
                var matr    = $(this).siblings('[data-type="matr"]').val();
                var tipus   = $(this).siblings('[data-type="tipus"]').val();
                var places  = $(this).siblings('[data-type="places"]').val();

                if (marca === "" || model === "" || comb === "" || matr === "" || tipus === "" || places === "") {
                    $(this).siblings(".alerta").css("display", "block");
                } else {
                    var array = {
                        marca: marca,
                        model: model,
                        combustible: comb,
                        matricula: matr,
                        tipus: tipus,
                        places: places
                    };

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo Config::get('constants.BaseUrl') ?>app/views/others/perfilQueries.php',
                        data: {id: '<?php echo $userdata->id ?>', act: "crear", dadesVehicle: array},
                        success: function (data) {
                            //console.log(data);
                            location.reload();
                        },
                        error: function (data) {
                            //console.log("Ajax error: " + data);
                            if (confirm("Hi ha hagut un problema inesperat!")) {
                                location.reload();
                            } else {
                                location.reload();
                            }
                        }
                    });
                }
            });

            // Editar - Foto - Eliminar / Els meus vehicles
            $(".botonsCotxe > button").on("click", function () {
                var idvehicle = $(this).parent().attr("data-id");
                var act;

                if ($(this).hasClass("btnMod")) {

                    $(".botonsCotxe.cotxe-" + idvehicle).css("display", "none");
                    $(".modificarCotxe.cotxe-" + idvehicle).css("display", "block");

                } else if ($(this).hasClass("btnFoto")) {
                    act = "foto";
                } else if ($(this).hasClass("btnDel")) {
                    act = "eliminar";

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo Config::get('constants.BaseUrl') ?>app/views/others/perfilQueries.php',
                        data: {id: '<?php echo $userdata->id ?>', idVehicle: idvehicle, act: act},
                        success: function (data) {
                            //console.log(data);
                            location.reload();
                        },
                        error: function (data) {
                            //console.log("Ajax error: " + data);
                            if (confirm("Hi ha hagut un problema inesperat!")) {
                                location.reload();
                            } else {
                                location.reload();
                            }
                        }
                    });
                }
            });

            $(".modificarCotxe > button").on("click", function () {
                if ($(this).hasClass("cancelarCotxe")) {
                    $(this).parent().css("display", "none");
                    $(this).parent().siblings(".botonsCotxe").css("display", "block");
                } else if ($(this).hasClass("guardarCotxe")) {
                    var act = "modificar";
                    var idvehicle = $(this).parent().attr("data-id");

                    var array = {
                        marca: $(this).siblings('[data-type="marca"]').val(),
                        model: $(this).siblings('[data-type="model"]').val(),
                        combustible: $(this).siblings('[data-type="comb"]').val(),
                        matricula: $(this).siblings('[data-type="matr"]').val()
                    };

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo Config::get('constants.BaseUrl') ?>app/views/others/perfilQueries.php',
                        data: {id: '<?php echo $userdata->id ?>', idVehicle: idvehicle, act: act, dadesVehicle: array},
                        success: function (data) {
                            //console.log(data);
                            location.reload();
                        },
                        error: function (data) {
                            //console.log("Ajax error: " + data);
                            if (confirm("Hi ha hagut un problema inesperat!")) {
                                location.reload();
                            } else {
                                location.reload();
                            }
                        }
                    });
                }

            });

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

                    var array = {
                        nom: $("#inputNom").val(),
                        cognoms: $("#inputCognoms").val(),
                        sexe: $("#selectSexe option:selected").text(),
                        data: $("#inputdataNaix").val(),
                        idiomes: $("#inputIdiomes").val(),
                        comentari: $("#comentari").val()
                    };

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo Config::get('constants.BaseUrl') ?>app/views/others/perfilQueries.php',
                        data: {id: '<?php echo $userdata->id ?>', dades: array},
                        success: function (data) {
                            //console.log(data);
                            location.reload();
                        },
                        error: function (data) {
                            console.log("Ajax error: " + data);
                            if (confirm("Hi ha hagut un problema inesperat!")) {
                                location.reload();
                            } else {
                                location.reload();
                            }
                        }
                    });

                    //insert
                } else {
                    $("#form_dadesUsuari input, #form_dadesUsuari select, #form_dadesUsuari #comentari").css("display", "block");
                    $("#form_dadesUsuari .txt2, #form_dadesUsuari .comentari").css("display", "none");

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
                $(id + " .alerta2").css("display", "none");
                $(id + " input").css("display", "none").val("");
                $(id + " .cancelar").css("display", "none");

                $(id + " input").val('');

                $(id).removeClass("mod");
            }

            function obrir(id) {
                $(id + " alerta").css("display", "none");
                $(id + " alerta2").css("display", "none");
                $(id + " input").css("display", "block");
                $(id + " .cancelar").css("display", "block");

                $(id).addClass("mod");
            }

            function canviarExtres(id) {
                var id1 = id;
                id = "#" + id;

                if ($(id).hasClass("mod")) {
                    if (id === "#canviarEmail") {
                        if (($("#inputEmail").val() === "") || ($("#inputEmail").val() !== $("#inputEmail2").val())) {
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

                                    tancar(id1);
                                },
                                error: function (data) {
                                    console.log("Ajax error: " + data);
                                    if (confirm("Hi ha hagut un problema inesperat!")) {
                                        location.reload();
                                    } else {
                                        location.reload();
                                    }
                                }
                            });

                            $(id + " input").val("");
                        }

                    } else if (id === "#canviarPass") {
                        if (($("#inputPass").val() !== "") && ($("#inputPassNew").val() === $("#inputPassNew2").val())) {
                            $(id + " .alerta").css("display", "none");
                            $(id + " .alerta2").css("display", "none");

                            $.ajax({
                                type: 'POST',
                                url: '<?php echo Config::get('constants.BaseUrl') ?>app/views/others/perfilQueries.php',
                                data: {comparar_pass: $("#inputPassOld").val(), id: '<?php echo $userdata->id ?>', pass: $("#inputPassNew").val()},
                                success: function (data) {
                                    if (data === "pass_updated") {
                                        tancar(id1);
                                    }
                                    else {
                                        $(id + " .alerta2").css("display", "block");
                                    }
                                },
                                error: function (data) {
                                    console.log("Ajax error: " + data);
                                    if (confirm("Hi ha hagut un problema inesperat!")) {
                                        location.reload();
                                    } else {
                                        location.reload();
                                    }
                                }
                            });

                            $(id + " input").val("");
                        } else {
                            $(id + " .alerta").css("display", "block");
                        }
                    } else if (id === "#canviarTlf") {
                        // if email = "" or email != email2
                        if ($("#inputTlf").val() === "") {
                            $(id + " .alerta").css("display", "block");
                        } else {
                            $(id + " .alerta").css("display", "none");

                            var tlf = $("#inputTlf").val();

                            $.ajax({
                                type: 'POST',
                                url: '<?php echo Config::get('constants.BaseUrl') ?>app/views/others/perfilQueries.php',
                                data: {id: '<?php echo $userdata->id ?>', tlf: tlf},
                                success: function (data) {
                                    $("#telefon").html(tlf);

                                    tancar(id1);
                                },
                                error: function (data) {
                                    console.log("Ajax error: " + data);
                                    if (confirm("Hi ha hagut un problema inesperat!")) {
                                        location.reload();
                                    } else {
                                        location.reload();
                                    }
                                }
                            });

                            $(id + " input").val("");
                        }
                    }
                } else {
                    obrir(id);
                }
            }

            $("#txtPlaces").keydown(function (e) {
                // Allow: backspace, delete, tab, escape and enter 
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
                        // Allow: Ctrl+A
                                (e.keyCode == 65 && e.ctrlKey === true) ||
                                // Allow: home, end, left, right, down, up
                                        (e.keyCode >= 35 && e.keyCode <= 40)) {
                            // let it happen, don't do anything
                            return;
                        }
                        // Ensure that it is a number and stop the keypress
                        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                            e.preventDefault();
                        }
                    });
        });
    </script>    
</div>
@stop

