<?php
include '../conexion.php';
include_once '../mensajes.php';

include '../conexion.php';
$prov_codigo = (isset($_REQUEST['prov_codigo']) ? $_REQUEST['prov_codigo'] : '');

$consulta = "UPDATE proveedores SET prov_estado='I' WHERE prov_codigo = '$prov_codigo'";
$result = mysqli_query($conexion, $consulta);

$respuesta = "";
if ($result) {
    if (mysqli_affected_rows($conexion) > 0) {
        $respuesta =  '<div class="centered-spinner">
            <div class="spinner-border" role="status">
            </div>
            <div class="mt-1 text-center">
                <span class="sr-only">Registro eliminado correctamente.</span>
            </div>
            </div>';
        header("refresh:2;proveedor.php");
    } else {

        $respuesta =  '<div class="centered-spinner">
            <div class="spinner-border" role="status">
            </div>
            <div class="mt-1 text-center">
            </div>
            </div>';
        header("refresh:2;proveedor.php");
    }
    echo $respuesta;
} else {
    echo "Error: " . mysqli_error($conexion);
}

// Cerrar la conexión
$conexion->close();
