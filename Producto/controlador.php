
<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);
include_once '../mensajes.php';

if (isset($_POST['guardar'])) {
    guardar();
}

if (isset($_POST['actualizar'])) {
    actualizar();
}

if (isset($_POST['borrar'])) {
    die("1");
    borrar();
}


function guardar()
{
    include '../conexion.php';
    include 'global.inc';
    $respuesta = "";


    $consulta = "INSERT INTO productos(pro_nombre, pro_descrip, id_proveedor, pro_cantidad, pro_fechac, pro_hora,pro_precio,pro_categoria)
     VALUES ('$nombre','$descripcion','$proveedor','$cantidad_stock',current_date,'CURRENT_TIME','$precio','$categoria')";
    if ($conexion->query($consulta) === TRUE) {
        $respuesta =  '<div class="centered-spinner">
                <div class="spinner-border" role="status">
                </div>
                <div class="mt-1 text-center">
                    <span class="sr-only">Guardando Producto...</span>
                </div>
                </div>';
        header("refresh:1.2;producto.php");
    } else {
        echo "Error: " . $consulta . "<br>" . $conexion->error;
    }
    echo $respuesta;
    // Cerrar la conexión
    $conexion->close();
}

function buscar()
{

    include '../conexion.php';
    include 'global.inc';

    $where = "1=1";
    if ($searhc != "") $where = " pro_nombre LIKE '%$searhc%'";

    $consulta = "SELECT * FROM productos p
    LEFT JOIN proveedores pv ON (pv.prov_codigo = p.id_proveedor)
     WHERE $where AND pv.prov_estado = 'A'";

    $result = $conexion->query($consulta);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            echo '<tr>';
            echo '<td>' . $row["pro_nombre"]  . '</td>';
            echo '<td>' . $row["pro_descrip"]  . '</td>';
            echo '<td>' . $row["id_proveedor"]  . '-' . $row["prov_nombre"]  . '</td>';
            echo '<td>' . $row["pro_precio"]  . '</td>';
            echo '<td>' . $row["pro_cantidad"]  . '</td>';
            echo '<td>' . $row["pro_categoria"]  . '</td>';
            echo '<td>' . $row["pro_fechac"]  . '</td>';
            echo '<td>' . '<a href=editarProducto.php?pro_codigo=' . $row['pro_codigo'] . ' class="btn btn-primary" >Editar</a>
            <a href=controlador.php?pro_codigo=' . $row['pro_codigo'] . '  class="btn btn-danger" onclick="borrar();">Borrar</a> </td>';
            echo '</tr>';
        }
    } else {
        echo '<td>No se encontraron resultados.</td>';
    }
    echo '</tr>';
    $conexion->close();
}

function proveedor()
{
    include '../conexion.php';
    include 'global.inc';
    $consulta = "SELECT * FROM proveedores WHERE 1=1 AND prov_estado = 'A'";
    $result = $conexion->query($consulta);
    // $resultado = $result->fetch_assoc();


    $respuesta = "";
    $cont = 0;
    $respuesta = "<option value=\"\">-</option>";
    while ($fila = mysqli_fetch_assoc($result)) {
        $respuesta .=  "'<option value='" . $fila['prov_codigo'] . "'>" . $fila['prov_codigo'] . '-' . $fila['prov_nombre'] . "</option>";
        $cont++;
    }

    echo $respuesta;
    $conexion->close();
}

function actualizar()
{
    include '../conexion.php';
    include 'global.inc';

    // Actualiza el valor del hash en la base de datos
    $consulta = "UPDATE productos SET pro_nombre='$nombre',pro_descrip='$descripcion',id_proveedor='$proveedor',pro_cantidad='$cantidad_stock',pro_precio='$precio',pro_categoria='$categoria' WHERE pro_codigo = '$pro_codigo'";

    $result = mysqli_query($conexion, $consulta);
    $respuesta = "";
    if ($result) {
        if (mysqli_affected_rows($conexion) > 0) {
            $respuesta =  '<div class="centered-spinner">
                <div class="spinner-border" role="status">
                </div>
                <div class="mt-1 text-center">
                    <span class="sr-only">Producto actualizado</span>
                </div>
                </div>';
            header("refresh:2;producto.php");
        } else {
            $respuesta =  '<div class="centered-spinner">
            <div class="spinner-border" role="status">
            </div>
            <div class="mt-1 text-center">
                <span class="sr-only">Ninguna fila fue afectada</span>
            </div>
            </div>';
            header("refresh:2;producto.php");
        }
        echo $respuesta;
    } else {
        echo "Error: " . mysqli_error($conexion);
    }



    $conexion->close();
}

function borrar()
{
    include '../conexion.php';
    include_once '../mensajes.php';
    include 'global.inc';

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
}
