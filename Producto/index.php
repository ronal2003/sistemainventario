<!DOCTYPE html>
<html>

<head>
  <title>Ejemplo de SweetAlert2</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>
  <input type="text" name="nombre" id="nombre">
  <button onclick="mostrarAlerta()">Mostrar alerta</button>

  <script>
    function mostrarAlerta() {
      const name = document.getElementById('nombre').value;
      if (name != '') {
        Swal.fire({
          title: 'Guardado!',
          text: 'Registro Guardado Exitosamente',
          icon: 'success',
          timer: 3000,
          showConfirmButton: false,
        });
      } else {

        Swal.fire({
          title: 'Ocurrio un error!',
          text: 'Seguro que si guardaste los cambios?',
          icon: 'error',
          timer: 3000, // 3 segundos
          showConfirmButton: false, // No mostrar el botón de confirmación

        });
      }

    }
  </script>
</body>

</html>