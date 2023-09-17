<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Proveedores</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php include '../util/head.php'; ?>
    <?php include 'controlador.php'; ?>

    <div class="container">
        <!-- <h1 class="mt-4">Sistema de Gestión de Inventario</h1> -->

        <h2 class="mt-4">Listado de Proveedores</h2>
        <form class="mb-4" action="proveedor.php" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="search" placeholder="Buscar producto...">
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre </th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                buscar();
                ?>
            </tbody>
        </table>

        <h2 class="mt-4">Agregar Proveedor</h2>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalAgregarProducto">Agregar</button>

        <!-- Modal Agregar Producto -->
        <div class="modal fade" id="modalAgregarProducto" tabindex="-1" role="dialog" aria-labelledby="modalAgregarProductoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAgregarProductoLabel">Agregar un proveedor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="controlador.php" method="POST">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Direccion:</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Telefono:</label>
                                <input type="number" class="form-control" id="telefono" name="telefono" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-secondary" name="guardar">Agregar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?php include '../util/footer.php'; ?>

</html>