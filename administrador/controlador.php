<?php
if (isset($_POST['actualizar'])) {
    actualizar();
}

function buscar()
{
    include '../conexion.php';

    $sql = "SELECT * FROM usuarios WHERE tipo <> ''";
    $result = $conexion->query($sql);

    // Verificar si la consulta tuvo resultados
    if ($result->num_rows > 0) {
        // Iterar a través de los resultados
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["id"]  . '</td>';
            echo '<td>' . $row["nombre"]  . '</td>';
            echo '<td>' . $row["usuario"]  . '</td>';
            echo '<td>' . $row["tipo"]  . '</td>';
            echo '<td>' . '<a href=editaradmin.php?id=' . $row['id'] . '&usuario=' . $row['usuario'] . '&contrasena=' . $row['contrasena'] . ' class="btn btn-primary">Editar</a>
                        <a href="borrar.php?id=1" class="btn btn-danger">Borrar</a>' . '</td>';
            echo '</tr>';
        }
    } else {
        echo "No se encontraron resultados.";
    }

    $conexion->close();
}

function actualizar()
{
    include '../conexion.php';

    $usuario = $_REQUEST['usuario'];
    $password = $_POST['contrasena'];


    $newPassword = password_hash($password, PASSWORD_DEFAULT);

    $consulta = "UPDATE usuarios SET contrasena = '$newPassword' WHERE usuario = '$usuario'";

    if ($conexion->query($consulta) === TRUE) {
        echo "Registro actualizado correctamente.";
        header("refresh:2;administrador.php");
    } else {
        echo "Error en la actualización: " . $mysqli->error;
    }


    $conexion->close();
}
