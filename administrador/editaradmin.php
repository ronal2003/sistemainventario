<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <!-- Incluye los estilos de Bootstrap (asegúrate de tener acceso a la librería de Bootstrap) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos CSS personalizados para el formulario */
        .custom-form {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Aplicamos la clase personalizada "custom-form" al formulario -->
                <form class="custom-form" action="controlador.php" method="POST">
                    <div class="form-group">
                        <h2 class="mb-4">Actualizar usuario</h2>

                        <label for="usuario">Usuario:</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" value="<?= $_GET['usuario'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="contrasena">Contraseña:</label>
                        <input type="password" class="form-control" id="contrasena" name="contrasena" value="<?= $_GET['contrasena'] ?>">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" id="actualizar" name="actualizar">Guardar Cambios</button>
                        <a href="administrador.php" class="btn btn-secondary ml-2" onclick="window.history.back();">Atrás</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Incluye los scripts de Bootstrap (asegúrate de tener acceso a la librería de Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>