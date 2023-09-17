<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de Usuarios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Incluye aquí tu archivo CSS personalizado si lo tienes -->
    <style>
        /* Estilos personalizados */
        /* Agrega tus estilos CSS personalizados aquí */
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Registro de Usuarios</h2>
                    </div>
                    <div class="card-body">
                        <form action="registrar.php" method="post">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="usuario">Usuario:</label>
                                <input type="text" class="form-control" name="usuario" required>
                            </div>
                            <div class="form-group">
                                <label for="contrasena">Contraseña:</label>
                                <input type="password" class="form-control" name="contrasena" required>
                            </div>
                            <div class="form-group">
                                <label for="tipo">Tipo de Usuario:</label>
                                <select class="form-control" name="tipo">
                                    <option value="normal">Normal</option>
                                    <option value="administrador">Administrador</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Registrar</button>
                                <a href="../usuario/usuario.php" class="btn btn-secondary ml-2" onclick="window.history.back();">Ya tengo una cuenta</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>