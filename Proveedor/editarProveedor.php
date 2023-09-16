<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Proveedor</title>
    <!-- Agrega los enlaces a los archivos de Bootstrap y CSS aquí -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos para el contenedor principal */
        .container {
            border-radius: 20px;
            /* Ajusta el valor según tu preferencia */
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            /* Agrega una sombra */
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Formulario de Proveedor</h2>
        <form action="controlador.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nombreProveedor">Nombre del Proveedor</label>
                    <input type="hidden" class="form-control" id="prov_codigo" name="prov_codigo" value="<?= $_GET['prov_codigo']  ?>">
                    <input type="text" class="form-control" id="prov_nombre" name="prov_nombre" value="<?= $_GET['prov_nombre']  ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" id="prov_direccion" name="prov_direccion" value="<?= $_GET['prov_direccion']  ?>">
                </div>
                <div class=" form-group col-md-4">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" id="prov_telefono" name="prov_telefono" value="<?= $_GET['prov_telefono']  ?>">
                </div>
                <div class=" form-group col-md-4">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="prov_email" name="prov_email" value="<?= $_GET['prov_email']  ?>">
                </div>
            </div>
            <div class=" text-center">
                <button type="submit" class="btn btn-primary" id="actualizar" name="actualizar">Guardar Cambios</button>
                <a href="proveedor.php" class="btn btn-secondary ml-2" onclick="window.history.back();">Atrás</a>
            </div>
        </form>
    </div>

    <!-- Agrega los enlaces a los archivos de Bootstrap y jQuery (si no están ya incluidos) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>