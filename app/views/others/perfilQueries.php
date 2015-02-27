<?php

$con = mysql_connect("localhost", "root", "");
mysql_select_db("dawsharing", $con);
mysql_set_charset("utf8");

//$con = mysql_connect("jona-PC", "jona", "1234");
//mysql_select_db("dawsharing", $con);
//mysql_set_charset("utf8");

if (isset($_POST['id'])) {
    if (isset($_POST['email'])) {

        $query = mysql_query("UPDATE Usuaris SET correu = '" . $_POST["email"] . "' WHERE id = " . $_POST["id"], $con);

        if ($query) {
            echo ("Affected rows: " . mysql_affected_rows());
        } else {
            echo('Invalid query: ' . mysql_error());
            // echo "-1";
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
            echo "1";
        } else {
            echo('Invalid query: ' . mysql_error());
            // echo "-1";
        }
    } else if (isset($_POST['dades'])) {
        
    } else {
        echo ("Error res canviat");
    }
} else {
    echo ("Error id");
}


