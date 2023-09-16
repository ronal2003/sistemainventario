<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="imagenes/descarga.jpg" type="image/x-icon">
    <title>Informe</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php include '../util/head.php'; ?>
    <?php include 'controlador.php'; ?>

    <div class="container">
        <h2>Pantalla de Búsqueda</h2>
        <form method="POST" action="informe.php">
            <div class="row mb-3">
                <div class="col">
                    <label for="pro_codigo" class="form-label">Código de Producto</label>
                    <input type="text" class="form-control" id="pro_codigo" name="pro_codigo" placeholder="Ingrese el código del producto">
                </div>
                <div class="col">
                    <label for="prov_codigo" class="form-label">Código de Proveedor</label>
                    <input type="text" class="form-control" id="prov_codigo" name="prov_codigo" placeholder="Ingrese el código del proveedor">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="fechaInc" class="form-label">Fecha Inicial</label>
                    <input type="date" class="form-control" id="fechaInc" name="fechaInc">
                </div>
                <div class="col">
                    <label for="fechaFin" class="form-label">Fecha Final</label>
                    <input type="date" class="form-control" id="fechaFin" name="fechaFin">
                </div>
            </div>
            <div class="mb-3">
                <label for="limite" class="form-label">Límite</label>
                <input type="number" class="form-control" id="limite" name="limite" style="width: 200px;" placeholder="Limite">
            </div>
            <button type="submit" class="btn btn-primary" name="buscar">Buscar</button>
        </form>
    </div>
    <br><br>

    <a href="exportar_excel.php"><img src="../img/excel.png"></a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Proveedor</th>
                <th>Descripcion</th>
                <th>fecha</th>
                <th>cantidad</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php informe(); ?>
        </tbody>
    </table>
    </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?php include '../util/footer.php'; ?>

</html>