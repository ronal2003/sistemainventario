<?php
include '../conexion.php';
include_once '../mensajes.php';


$sql = "SELECT id FROM usuarios WHERE tipo <> ''";
$result = $conexion->query($sql);

// Verificar si la consulta tuvo resultados
if ($result->num_rows > 0) {
    // Iterar a través de los resultados
    while ($row = $result->fetch_assoc()) {
        $usuid = $row['id'];
    }
}

$query = "DELETE FROM usuarios WHERE id = '$usuid'";
$result = mysqli_query($conexion, $query);

// Ejecutar la consulta
$respuesta = "";
if ($result) {
    if (mysqli_affected_rows($conexion) > 0) {
        $respuesta = '<div class="centered-spinner">
                <div class="spinner-border" role="status">
                </div>
                <div class="mt-1 text-center">
                    <span class="sr-only">Eliminando Usuario...</span>
                </div>
                </div>';
        header("refresh:1;administrador.php");
    }
    echo $respuesta;
} else {
    echo "Error: " . mysqli_error($conexion);
}

// Cerrar la conexión
$conexion->close();
