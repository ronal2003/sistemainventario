<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_de_datos = "inventario";

// Establecer conexión
$conexion = mysqli_connect($host, $usuario, $contrasena, $base_de_datos);

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
