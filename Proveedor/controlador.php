<?php

include '../mensajes.php';

if (isset($_POST['guardar'])) {
    guardar();
}

if (isset($_POST['actualizar'])) {
    actualizar();
}

function guardar()
{
    include '../conexion.php';


    $nombre = (isset($_POST['nombre']) ? $_POST['nombre'] : '');
    $direccion = (isset($_POST['direccion']) ? $_POST['direccion'] : '');
    $telefono = (isset($_POST['telefono']) ? $_POST['telefono'] : '');
    $email = (isset($_POST['email']) ? $_POST['email'] : '');

    $consulta = "INSERT INTO proveedores (prov_nombre, prov_direccion,prov_telefono,prov_email,prov_fechac,prov_hora,prov_estado)
     VALUES ('$nombre','$direccion','$telefono','$email',current_date,'CURRENT_TIME','A')";

    if ($conexion->query($consulta) === TRUE) {
        $respuesta =  '<div class="centered-spinner">
        <div class="spinner-border" role="status">
        </div>
        <div class="mt-1 text-center">
            <span class="sr-only">Guardando proveedor.</span>
        </div>
        </div>';
        header("refresh:1;proveedor.php");
    } else {
        echo "Error: " . $consulta . "<br>" . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
}

function buscar()
{

    include '../conexion.php';
    $nombre = (isset($_POST['search']) ? $_POST['search'] : '');

    $where = "1=1";
    if ($nombre != "") $where = " prov_nombre LIKE '%$nombre%'";




    $consulta = "SELECT * FROM proveedores WHERE $where AND prov_estado = 'A'";
    $result = $conexion->query($consulta);

    // Verificar si la consulta tuvo resultados
    if ($result->num_rows > 0) {
        // Iterar a través de los resultados
        while ($row = $result->fetch_assoc()) {


            echo '<td>' . $row["prov_nombre"]  . '</td>';
            echo '<td>' . $row["prov_direccion"]  . '</td>';
            echo '<td>' . $row["prov_telefono"]  . '</td>';
            echo '<td>' . $row["prov_email"]  . '</td>';
            echo '<td>' . '<a href=editarProveedor.php?prov_codigo=' . $row['prov_codigo'] . '&prov_nombre=' . $row['prov_nombre'] . '&prov_direccion=' . $row['prov_direccion'] . '&prov_telefono=' . $row['prov_telefono'] . '&prov_email=' . $row['prov_email']  . ' class="btn btn-primary">Editar</a>
            <a href=eliminarProveedor.php?prov_codigo=' . $row['prov_codigo'] . ' name="borrar" id="borrar" class="btn btn-danger">Borrar</a> </td></td>';
            echo '</tr>';
            echo '</tr>';
        }
    } else {
        echo '<td>  No se encontraron resultados. </td>';
    }

    $conexion->close();
}

function actualizar()
{
    include '../conexion.php';
    // Recopila la nueva contraseña del usuario (por ejemplo, a través de un formulario)
    $prov_nombre = (isset($_POST['prov_nombre']) ? $_POST['prov_nombre'] : '');
    $prov_direccion = (isset($_POST['prov_direccion']) ? $_POST['prov_direccion'] : '');
    $prov_telefono = (isset($_POST['prov_telefono']) ? $_POST['prov_telefono'] : '');
    $prov_email = (isset($_POST['prov_email']) ? $_POST['prov_email'] : '');
    $prov_codigo = (isset($_POST['prov_codigo']) ? $_POST['prov_codigo'] : '');


    // Actualiza el valor del hash en la base de datos
    $consulta = "UPDATE proveedores SET prov_nombre='$prov_nombre',prov_direccion='$prov_direccion',prov_telefono='$prov_telefono',prov_email='$prov_email' WHERE prov_codigo = '$prov_codigo'";
    $result = mysqli_query($conexion, $consulta);

    $respuesta = "";
    if ($result) {
        if (mysqli_affected_rows($conexion) > 0) {
            $respuesta =  '<div class="centered-spinner">
            <div class="spinner-border" role="status">
            </div>
            <div class="mt-1 text-center">
                <span class="sr-only">Registro actualizado correctamente.</span>
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



    $conexion->close();
}
