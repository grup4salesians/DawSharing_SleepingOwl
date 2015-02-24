<?php

//$con = mysql_connect("localhost", "root", "");
//mysql_select_db("dawsharing", $con);
//mysql_set_charset("utf8");

$con = mysql_connect("jona-PC", "jona", "1234");
mysql_select_db("dawsharing", $con);
mysql_set_charset("utf8");

if (isset($_POST['id'])) {
    if (isset($_POST['email'])) {

        $query = mysql_query("UPDATE Usuaris SET correu = '" . $_POST["email"] . "' WHERE id = '" . $_POST["id"] . "'");

        if ($query) {
            echo "1";
        } else {
            echo('Invalid query: ' . mysql_error());
            // echo "-1";
        }
    } else if (isset($_POST['pass'])) {
        $query = mysql_query("UPDATE Usuaris SET contrasenya = '" . $_POST["pass"] . "' WHERE id = '" . $_POST["id"] . "'");

        if ($query) {
            echo "1";
        } else {
            echo('Invalid query: ' . mysql_error());
            // echo "-1";
        }
    } else if (isset($_POST['tlf'])) {
        $query = mysql_query("UPDATE Usuaris SET telefon = '" . $_POST["tlf"] . "' WHERE id = '" . $_POST["id"] . "'");

        if ($query) {
            echo "1";
        } else {
            echo('Invalid query: ' . mysql_error());
            // echo "-1";
        }
    } else if (isset($_POST['dades'])) {
        
    } else {
        echo "-1";
    }
}


