<?php
// Conexión a la base de datos
include '../conexion.php';

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
$tipo = $_POST['tipo'];

// Insertar usuario en la base de datos
$sql = "INSERT INTO usuarios (nombre, usuario, contrasena, tipo) VALUES ('$nombre', '$usuario', '$contrasena', '$tipo')";

if ($conexion->query($sql) === TRUE) {
    echo '<div class="centered-spinner">
    <div class="spinner-border" role="status">
    </div>
    <div class="mt-1 text-center">
        <span class="sr-only">Creando usuario...</span>
    </div>
</div>';
    header("refresh:2; ../usuario/usuario.php");
} else {
    echo "Error al registrar el usuario: " . $conexion->error;
}

$conexion->close();
