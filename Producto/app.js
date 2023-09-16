
function validaFormularioProducto() {
    const nombre = document.getElementById('nombre').value;
    const descripcion = document.getElementById('descripcion').value;
    const precio = document.getElementById('precio').value;
    const cantidad_stock = document.getElementById('cantidad_stock').value;
    const categoria = document.getElementById('categoria').value;

    if (nombre == '' && descripcion == '' && precio == '' && cantidad_stock == '' && categoria == '') {

        Swal.fire({
            title: 'Ocurrio un error!',
            text: 'Debes de llenar los campos',
            icon: 'error',
            timer: 2000, // 3 segundos
            showConfirmButton: false, // No mostrar el botón de confirmación

        });
    }

}

