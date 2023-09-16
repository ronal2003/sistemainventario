<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="colorfondo.css">
    <title>Sistema de Gestión de Inventario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php include '../util/head.php'; ?>
    <?php include 'controlador.php'; ?>

    <div class="container">
        <!-- <h1 class="mt-4">Sistema de Gestión de Inventario</h1> -->

        <h2 class="mt-4">Listado Productos</h2>
        <form class="mb-4" action="producto.php" method="POST">
            <div class=" form-group">
                <input type="text" class="form-control" name="search" placeholder="Buscar producto...">
            </div>
            <button type="submit" class="btn btn-primary" name="buscar" id="buscar">Buscar</button>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Proveedor</th>
                    <th>Precio</th>
                    <th>Cantidad en Stock</th>
                    <th>Categoria</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody name="tbody">
                <?php

                buscar();
                ?>

            </tbody>
        </table>




        <h2 class="mt-4">Agregar Producto</h2>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalAgregarProducto">Agregar</button>

        <!-- Modal Agregar Producto -->

        <div class="modal fade" id="modalAgregarProducto" tabindex="-1" role="dialog" aria-labelledby="modalAgregarProductoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAgregarProductoLabel">Agregar Producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="controlador.php" id="myForm" method="POST">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="cantidad_stock">Precio:</label>
                                <input type="number" class="form-control" id="precio" name="precio" required>
                            </div>
                            <div class="form-group">
                                <label for="cantidad_stock">Cantidad en Productos:</label>
                                <input type="number" class="form-control" id="cantidad_stock" name="cantidad_stock" required>
                            </div>
                            <div class="form-group">
                                <label for="categoria">Categoria:</label>
                                <select class="form-control" id="categoria" name="categoria" required>
                                    <option value="-">-</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <!-- Agrega más opciones según sea necesario -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="proveedor">Proveedor:</label>
                                <select class="form-control" id="proveedor" name="proveedor">
                                    <?= proveedor(); ?>
                                    <!-- Agrega más opciones según sea necesario -->
                                </select>
                            </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-secondary" id="guardar" name="guardar" onclick="validaFormularioProducto();">Agregar</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>


    </div>


    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?php include '../util/footer.php'; ?>

</html>

<?php
include '../conexion.php';
$pro_codigo = (isset($_REQUEST['pro_codigo']) ? $_REQUEST['pro_codigo'] : '');

$query = "DELETE FROM productos WHERE pro_codigo = '$pro_codigo'";
$result = mysqli_query($conexion, $query);

// Ejecutar la consulta
$respuesta = "";
if ($result) {
    if (mysqli_affected_rows($conexion) > 0) {
        $respuesta = "Registro borrado correctamente.";
    }
    echo $respuesta;
} else {
    echo "Error: " . mysqli_error($conexion);
}

// Cerrar la conexión
$conexion->close();
?>