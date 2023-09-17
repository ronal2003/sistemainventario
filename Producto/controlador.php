
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
    $respuesta =
        $nombre = (isset($_POST['nombre']) ? $_POST['nombre'] : '');
    $descripcion = (isset($_POST['descripcion']) ? $_POST['descripcion'] : '');
    $cantidad_stock = (isset($_POST['cantidad_stock']) ? $_POST['cantidad_stock'] : '');
    $precio = (isset($_POST['precio']) ? $_POST['precio'] : '');
    $categoria = (isset($_POST['categoria']) ? $_POST['categoria'] : '');
    $proveedor = (isset($_POST['proveedor']) ? $_POST['proveedor'] : '');

    $consulta = "INSERT INTO productos(pro_nombre, pro_descrip, id_proveedor, pro_cantidad, pro_fechac, pro_hora,pro_precio,pro_categoria)
     VALUES ('$nombre','$descripcion','$proveedor','$cantidad_stock',current_date,'CURRENT_TIME','$precio','$categoria')";
    if ($conexion->query($consulta) === TRUE) {
        echo '<div class="centered-spinner">
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
    $nombre = (isset($_POST['search']) ? $_POST['search'] : '');

    $where = "1=1";
    if ($nombre != "") $where = " pro_nombre LIKE '%$nombre%'";




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
            <a href=eliminarproducto.php?pro_codigo=' . $row['pro_codigo'] . '  class="btn btn-danger">Borrar</a> </td>';
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

    $nombre = (isset($_POST['pro_nombre']) ? $_POST['pro_nombre'] : '');
    $pro_descrip = (isset($_POST['pro_descrip']) ? $_POST['pro_descrip'] : '');
    $pro_cantidad = (isset($_POST['pro_cantidad']) ? $_POST['pro_cantidad'] : '');
    $pro_precio = (isset($_POST['pro_precio']) ? $_POST['pro_precio'] : '');
    $pro_catego = (isset($_POST['pro_catego']) ? $_POST['pro_catego'] : '');
    $proveedor = (isset($_POST['id_proveedor']) ? $_POST['id_proveedor'] : '');
    $pro_codigo = (isset($_POST['pro_codigo']) ? $_POST['pro_codigo'] : '');



    // Actualiza el valor del hash en la base de datos
    $consulta = "UPDATE productos SET pro_nombre='$nombre',pro_descrip='$pro_descrip',id_proveedor='$proveedor',pro_cantidad='$pro_cantidad',pro_precio='$pro_precio',pro_categoria='$pro_catego' WHERE pro_codigo = '$pro_codigo'";

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
}
