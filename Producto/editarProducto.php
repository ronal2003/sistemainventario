<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Actualizar Producto</title>
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
                            <input type="hidden" class="form-control" id="pro_codigo" name="pro_codigo" value="<?= $_GET['pro_codigo'] ?>">
                            <div class="form-group">
                                <h2 class="mb-4">Actualizar Producto</h2>

                                <label for="usuario">producto:</label>
                                <input type="text" class="form-control" id="pro_nombre" name="pro_nombre" value="<?= $_GET['pro_nombre'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="contrasena">Descripcion:</label>
                                <input type="text" class="form-control" id="pro_descrip" name="pro_descrip" value="<?= $_GET['pro_descrip'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="contrasena">Precio:</label>
                                <input type="text" class="form-control" id="pro_precio" name="pro_precio" value="<?= $_GET['pro_precio'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="contrasena">Cantidad Productos:</label>
                                <input type="text" class="form-control" id="pro_cantidad" name="pro_cantidad" value="<?= $_GET['pro_cantidad'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="contrasena">Categoria:</label>
                                <input type="text" class="form-control" id="pro_catego" name="pro_catego" value="<?= $_GET['pro_catego'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="contrasena">Proveedor:</label>
                                <input type="text" class="form-control" id="id_proveedor" name="id_proveedor" value="<?= $_GET['id_proveedor'] ?>">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" id="actualizar" name="actualizar">Guardar Cambios</button>
                                <a href="producto.php" class="btn btn-secondary ml-2" onclick="window.history.back();">Atrás</a>
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
</body>

</html>