<link rel="stylesheet" href="../style.css">
<header>
    <h1>Sistema de Gestión de Inventario</h1>
</header>
<nav>
    <ul>

        <?php
        session_start();


        if (isset($_SESSION['usuario_id'])) {
            echo '<li><a href="../Inicio/inicio.php">Inicio</a></li>
            <li><a href="../Producto/producto.php">Producto</a></li>
            <li><a href="../Proveedor/proveedor.php">Proveedor</a></li>
            <li><a href="../Informe/informe.php">Informe</a></li>';

            echo '<li>';
            echo '<a  href="../usuario/cerrarsesion.php">Cerrar Sesión</a>';
            echo '</li>';
        } else {
            echo '<ul>
            <li>
                <a class="nav-link" href="../usuario/usuario.php">Iniciar Sesión</a>
            </li>
        </ul>';
        }
        ?>

</nav>
<main>
    <section id="inicio">
    </section>
    <section id="producto">
    </section>
    <section id="proveedor" </section>
        <section id="informe">
        </section>

        <!-- <script>
            function redirectToPage() {
                const selectElement = document.getElementById('select-option');
                const selectedValue = selectElement.value;
                if (selectedValue) {
                    window.location.href = selectedValue;
                }
            }
        </script> -->