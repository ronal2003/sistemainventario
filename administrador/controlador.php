<?php


include '../mensajes.php';
if (isset($_POST['actualizar'])) {
    actualizar();
}

if (isset($_POST['guardar'])) {
    guardarUsuario();
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
                        <a href="eliminarusuario.php?id=' . $row['id'] . '" class="btn btn-danger">Borrar</a>' . '</td>';
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
    include  '../mensajes.php';

    $usuario = $_REQUEST['usuario'];
    $password = $_POST['contrasena'];


    $newPassword = password_hash($password, PASSWORD_DEFAULT);

    $consulta = "UPDATE usuarios SET contrasena = '$newPassword' WHERE usuario = '$usuario'";
    $respuesta = "";
    if ($conexion->query($consulta) === TRUE) {
        $respuesta = '<div class="centered-spinner">
                <div class="spinner-border" role="status">
                </div>
                <div class="mt-1 text-center">
                    <span class="sr-only">Actualizando Usuario...</span>
                </div>
                </div>';
        header("refresh:2;administrador.php");
    } else {
        echo "Error en la actualización: " . $mysqli->error;
    }
    echo $respuesta;

    $conexion->close();
}

function guardarUsuario()
{
    include '../conexion.php';
    $respuesta = "";
    $name = (isset($_POST['name']) ? $_POST['name'] : '');
    $email = (isset($_POST['email']) ? $_POST['email'] : '');
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
    $tipo = (isset($_POST['tipo']) ? $_POST['tipo'] : '');

    $consulta = "INSERT INTO usuarios(nombre, usuario, contrasena, tipo)
    VALUES ('$name','$email','$contrasena','$tipo')";

    if ($conexion->query($consulta) === TRUE) {
        echo '<div class="centered-spinner">
            <div class="spinner-border" role="status">
            </div>
            <div class="mt-1 text-center">
                <span class="sr-only">Guardando usuario...</span>
            </div>
            </div>';
        header("refresh:1.2;administrador.php");
    } else {
        echo "Error: " . $consulta . "<br>" . $conexion->error;
    }
    echo $respuesta;
    // Cerrar la conexión
    $conexion->close();
}
