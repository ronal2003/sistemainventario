function enviar() {
    var nombre = document.getElementById('nombre').value;
    var apellido = document.getElementById('apellido').value;
    var direccion = document.getElementById('direccion').value;
    var correo = document.getElementById('correo').value;
    var nombre_empresa = document.getElementById('nombre_empresa').value;

    if (nombre != '' && apellido != '' && direccion != '' && correo != '' && nombre_empresa != '') {
        alert('Sus datos an sido diligenciados');
        // sleep(2); // Esperar 2 segundos
        // header("Location: ../incio/incio.php");
        window.location.href = 'inicio.php';
    }
}