<?php
$conexionBD;
function conectar_bd()
{
    global $conexionBD;

    $usuario = "root";
    $contra  = "";
    $servidor ="localhost";
    $basedatos = "Resguardo";
    $conexionBD = mysql_connect($servidor, $usuario , $contra) or die (mysql_error());
    mysql_select_db($basedatos, $conexionBD ) or die (mysql_error());
}
?>
