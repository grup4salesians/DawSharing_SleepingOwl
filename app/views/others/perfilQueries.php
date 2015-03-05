<?php

//$con = mysql_connect("localhost", "root", "");
//mysql_select_db("dawsharing", $con);
//mysql_set_charset("utf8");

$con = mysql_connect("localhost", "jona", "1234");
mysql_select_db("dawsharing", $con);
mysql_set_charset("utf8");

if (isset($_POST['id'])) {
    if (isset($_POST['email'])) {

        $query = mysql_query("UPDATE Usuaris SET correu = '" . $_POST["email"] . "' WHERE id = " . $_POST["id"], $con);

        if ($query) {
            echo ("Affected rows: " . mysql_affected_rows());
        } else {
            echo('Invalid query: ' . mysql_error());
        }
    } else if (isset($_POST['pass']) && isset($_POST["comparar_pass"])) {
        $query = mysql_query("SELECT contrasenya FROM Usuaris Where id = " . $_POST["id"]);

        $data = mysql_fetch_assoc($query);
        $enc_pass = $data["contrasenya"];

        if (password_verify($_POST['comparar_pass'], $enc_pass)) {

            $query = mysql_query("UPDATE Usuaris SET contrasenya = '" . crypt($_POST["pass"], "$2y$1022") . "' WHERE id = " . $_POST["id"]);

            if ($query) {
                echo "pass_updated";
            } else {
                echo('Invalid query: ' . mysql_error());
            }
        };
    } else if (isset($_POST['tlf'])) {
        $query = mysql_query("UPDATE Usuaris SET telefon = '" . $_POST["tlf"] . "' WHERE id = " . $_POST["id"]);

        if ($query) {
            echo ("Affected rows: " . mysql_affected_rows());
        } else {
            echo('Invalid query: ' . mysql_error());
        }
    } else if (isset($_POST['dades'])) {
        $query = mysql_query("UPDATE Usuaris SET nom = '" . $_POST['dades']["nom"] . "', cognoms = '" . $_POST['dades']["cognoms"] . "', sexe = '" . $_POST['dades']["sexe"] . "', "
                . "data_naixement = '" . $_POST['dades']["data"] . "', idioma = '" . $_POST['dades']["idiomes"] . "', comentari = '" . $_POST['dades']["comentari"] . "' WHERE id = " . $_POST["id"]);

//        var array = {
//            nom:        $("#inputNom").val(),
//            cognoms:    $("#inputCognoms").val(),
//            sexe:       $( "#selectSexe option:selected" ).text(),
//            data:       $("#inputdataNaix").val(),
//            idiomes:    $("#inputIdiomes").val(),
//            comentari:  $("#comentari").val()
//        };

        if ($query) {
            echo ("Affected rows aaa: " . mysql_affected_rows() . " , " . $_POST["id"]);
        } else {
            echo('Invalid query: ' . mysql_error());
        }
    } else if (isset($_POST["idVehicle"])) {
        if ($_POST["act"] === "modificar") {
            $query = mysql_query("UPDATE vehicles SET custom_marca = '" . $_POST["dadesVehicle"]["marca"] . "', custom_model = '" . $_POST["dadesVehicle"]["model"] . "', combustio = '" . $_POST["dadesVehicle"]["combustible"] . "' WHERE id = " . $_POST["idVehicle"]);

            $query2 = mysql_query("UPDATE vehiclesusuaris SET matricula = '" . $_POST["dadesVehicle"]["matricula"] . "' WHERE vehicles_id = " . $_POST["idVehicle"] . " AND usuaris_id = " . $_POST['id']);

            if ($query) {
                echo ("Affected rows: " . mysql_affected_rows());
            } else {
                echo('Invalid query: ' . mysql_error());
            }
        } else if ($_POST["act"] === "foto") {
            
        } else if ($_POST["act"] === "eliminar") {
            $query = mysql_query("DELETE FROM vehiclesusuaris WHERE vehicles_id = " . $_POST["idVehicle"] . " AND usuaris_id = " . $_POST['id']);

            if ($query) {
                echo ("Affected rows: " . mysql_affected_rows());
            } else {
                echo('Invalid query: ' . mysql_error());
            }
        }
    } else if ($_POST["act"] === "crear") {
        // insert vehicle - model marca combustible -> get id
        // insert vehicleusuari - idvehicle id usuari matricula

        $query = mysql_query("INSERT INTO vehicles (tipus, combustio, places, custom_marca, custom_model) "
                . "VALUES ('" . $_POST["dadesVehicle"]["tipus"] . "', '" . $_POST["dadesVehicle"]["combustible"] . "', " . $_POST["dadesVehicle"]["places"] . ", '" . $_POST["dadesVehicle"]["marca"] . "', '" . $_POST["dadesVehicle"]["model"] . "')");

        $idvehicle = mysql_insert_id();

        $query2 = mysql_query("INSERT INTO vehiclesusuaris (vehicles_id, usuaris_id, matricula) VALUES (" . $idvehicle . ", " . $_POST['id'] . ", '" . $_POST["dadesVehicle"]["matricula"] . "')");

        if ($query && $query2) {
            echo ("Affected rows: " . mysql_affected_rows());
        } else {
            echo('Invalid query: ' . mysql_error());
        }
    } else {
        echo ("Error res canviat");
    }
} else {
    echo ("Error id");
}


