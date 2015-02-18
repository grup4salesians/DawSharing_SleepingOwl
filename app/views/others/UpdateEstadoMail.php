<?php

$con = mysql_connect("jona-PC", "jona", "1234");
mysql_select_db("dawsharing", $con);
mysql_set_charset("utf8");

$result = mysql_query("update correus set vist = " . $_POST["codigo"] . " where id = ". $_POST["codigo"] .";");
?>