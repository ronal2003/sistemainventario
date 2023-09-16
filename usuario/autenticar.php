<?php
// Conexión a la base de datos (igual que en registrar.php)
include '../conexion.php';
include_once '../mensajes.php';

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];


// Consulta para verificar las credenciales del usuario
$sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";

$resultado = $conexion->query($sql);

if ($resultado->num_rows == 1) {
    $fila = $resultado->fetch_assoc();
    if (password_verify($contrasena, $fila['contrasena'])) {
        session_start();
        $_SESSION['usuario_id'] = $fila['id'];
        $_SESSION['tipo_usuario'] = $fila['tipo'];

        if ($_SESSION['tipo_usuario'] == 'administrador') {
            echo '<div class="centered-spinner">
            <div class="spinner-border" role="status">
            </div>
            <div class="mt-1 text-center">
                <span class="sr-only">Iniciando sesion...</span>
            </div>
        </div>';
            header("refresh:2; ../administrador/administrador.php");
        } else {
            echo '<div class="centered-spinner">
                <div class="spinner-border" role="status">
                </div>
                <div class="mt-1 text-center">
                    <span class="sr-only">Iniciando sesion...</span>
                </div>
            </div>';
            header("refresh:2; ../Inicio/inicio.php");
        }
        // $_SESSION['tipo_usuario'] = $_SESSION['tipo_usuario'] == 'administrador' ?  header("refresh:2; ../util/head.php") : header("Location: ../producto/producto.php");
    } else {
        echo '<div class="centered-spinner">
                <div class="spinner-border" role="status">
                </div>
                <div class="mt-1 text-center">
                    <span class="sr-only">Contraseña incorrecta...</span>
                </div>
       
            </div>';
        header("refresh:2; ../usuario/usuario.php");
    }
} else {
    echo '<div class="centered-spinner">
            <div class="spinner-border" role="status">
            </div>
            <div class="mt-1 text-center">
                <span class="sr-only">Usuario no encontrado...</span>
            </div>
         </div>';
    header("refresh:2; ../registrarse/registro.php");
}

$conexion->close();
