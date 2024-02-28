<?php

//Realizar la coneccion a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$basedatos = "parking_plus_db";

//Crear una conexion
$conexion = new mysqli($servername, $username, $password, $basedatos);

//Verificar la conexion
if ($conexion->connect_error) {
  die("La conexión a la base de datos tuvo un error: " . $conexion->connect_error);
}
?>