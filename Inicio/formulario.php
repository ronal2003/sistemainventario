<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Datos</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <header>
        <!-- Encabezado del sitio web -->
    </header>

    <main>
        <div class="formulario">
            <h2>Diligenciar Datos</h2>
            <form action="procesar_datos.php" method="post">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" style="width: 300px;" name="nombre" required>
                <br>

                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" style="width: 300px;" name="apellido" required>
                <br>

                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" style="width: 300px;" name="direccion" required>
                <br>

                <label for="correo">Correo Electrónico:</label>
                <input type="email" style="width: 300px;" id="correo" name="correo" required>
                <br>

                <label for="nombre-empresa">Nombre de la Empresa:</label>
                <input type="text" id="nombre-empresa" style="width: 300px;" name="nombre-empresa" required>
                <br>

                <input type="submit" class="boton-crema" value="Enviar">
            </form>
        </div>
    </main>



</body>

</html>