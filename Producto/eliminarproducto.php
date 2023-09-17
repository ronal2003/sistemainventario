<?php
include '../conexion.php';
include_once '../mensajes.php';

$pro_codigo = (isset($_REQUEST['pro_codigo']) ? $_REQUEST['pro_codigo'] : '');

$query = "DELETE FROM productos WHERE pro_codigo = '$pro_codigo'";
$result = mysqli_query($conexion, $query);

// Ejecutar la consulta
$respuesta = "";
if ($result) {
    if (mysqli_affected_rows($conexion) > 0) {
        $respuesta = '<div class="centered-spinner">
                <div class="spinner-border" role="status">
                </div>
                <div class="mt-1 text-center">
                    <span class="sr-only">Eliminando producto...</span>
                </div>
                </div>';
        header("refresh:1;producto.php");
    }
    echo $respuesta;
} else {
    echo "Error: " . mysqli_error($conexion);
}

// Cerrar la conexión
$conexion->close();
