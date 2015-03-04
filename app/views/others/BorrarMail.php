<?php

//$con = mysql_connect("jona-PC", "jona", "1234");
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//Poner usuario que haga falta!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$con = mysql_connect("localhost", "jona", "1234");
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
mysql_select_db("dawsharing", $con);
mysql_set_charset("utf8");

$result = mysql_query("delete from correus where ". $_POST["where"] .";");

if (!$result) {
    $mensaje  = 'Consulta no válida: ' . mysql_error() . "\n";
    $mensaje .= 'Consulta completa: ' . $consulta;
    echo($mensaje);
}
?>