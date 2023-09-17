<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel de Administrador</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos personalizados */
        .container {
            margin-top: 50px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f0f0f0;
        }

        .btn-group {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <?php include '../util/head.php' ?>
    <?php include 'controlador.php' ?>


    <div class="container">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">
            Guardar
        </button>

        <!-- Modal -->
        <div class="modal fade" id="add">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar Usuario</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="controlador.php" method="post">
                            <input type="hidden" id="userId" name="userId" value="">
                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="email">Contraseña:</label>
                                <input type="text" class="form-control" id="contrasena" name="contrasena">
                            </div>
                            <div class="form-group">
                                <label for="tipo">Tipo de Usuario:</label>
                                <select class="form-control" name="tipo">
                                    <option value="normal">Normal</option>
                                    <option value="administrador">Administrador</option>
                                </select>
                            </div>
                            <button type="submit" id="guardar" name="guardar" class="btn btn-primary">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <table class="table table-striped align-middle" id="table_id">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí puedes cargar los datos de los usuarios desde la base de datos -->
                <tr>
                    <?php buscar(); ?>

                </tr>
                <div class="modal fade" id="edit">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Editar Usuario</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="controlador.php" method="GET">
                                    <input type="hidden" id="nombre" name="nombre" value="">
                                    <div class="form-group">
                                        <label for="name">Nombre:</label>
                                        <input type="text" class="form-control" id="usuario" name="usuario" onclick="<? echo $_POST['id']; ?>">
                                    </div>
                                    <div class=" form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="tipo" name="tipo">
                                    </div>
                                    <button type="submit" id="editar" name="editar" class="btn btn-primary">Guardar Cambios</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </tbody>
        </table>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>