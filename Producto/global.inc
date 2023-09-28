<?php 

    $nombre = (isset($_POST['nombre']) ? $_POST['nombre'] : '');
    $descripcion = (isset($_POST['descripcion']) ? $_POST['descripcion'] : '');
    $cantidad_stock = (isset($_POST['cantidad_stock']) ? $_POST['cantidad_stock'] : '');
    $precio = (isset($_POST['precio']) ? $_POST['precio'] : '');
    $categoria = (isset($_POST['categoria']) ? $_POST['categoria'] : '');
    $proveedor = (isset($_POST['id_proveedor']) ? $_POST['id_proveedor'] : '');
    $searhc = (isset($_POST['search']) ? $_POST['search'] : '');
    $pro_codigo = (isset($_REQUEST['pro_codigo']) ? $_REQUEST['pro_codigo'] : '');
      

?>
