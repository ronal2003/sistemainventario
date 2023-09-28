<?php




if (isset($_POST['buscar'])) {
    informe();
}

function informe()
{

    include '../conexion.php';

    $pro_codigo = (isset($_POST['pro_codigo']) ? $_POST['pro_codigo'] : '');
    $prov_codigo = (isset($_POST['prov_codigo']) ? $_POST['prov_codigo'] : '');
    $fechaInc = (isset($_POST['fechaInc']) ? $_POST['fechaInc'] : '');
    $fechaFin = (isset($_POST['fechaFin']) ? $_POST['fechaFin'] : '');
    $limite = (isset($_POST['limite']) ? $_POST['limite'] : '');

    $where = "1=1";

    if ($pro_codigo  != '')    $where .= " AND p.pro_codigo   = '$pro_codigo'";
    if ($prov_codigo != '')    $where .= " AND pv.prov_codigo = '$prov_codigo'";
    if ($fechaInc    != '')    $where .= " AND p.pro_fechac BETWEEN  '$fechaInc' AND '$fechaInc'";
    $limite = ($limite    != '') ?    $limite : $limite = 10;



    $consulta = "SELECT CONCAT(p.pro_codigo, ' - ', p.pro_nombre) AS producto,
    CONCAT(p.id_proveedor, ' - ' , pv.prov_nombre) AS proveedor, 
    p.pro_descrip, 
    p.pro_fechac, 
    p.pro_cantidad, 
    count(p.pro_cantidad) as total
     from productos p
    LEFT join proveedores pv on (pv.prov_codigo=p.id_proveedor)
    WHERE $where AND pv.prov_estado = 'A'
    GROUP BY p.pro_codigo
    LIMIT $limite";
    // echo "<pre>$consulta</pre>";
    $result = $conexion->query($consulta);



    // Verificar si la consulta tuvo resultados
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            echo '<tr>';
            echo '<td>' . $row["producto"] . '</td>';
            echo '<td>' . $row["proveedor"]  . '</td>';
            echo '<td>' . $row["pro_descrip"] . '</td>';
            echo '<td>' . $row["pro_fechac"]  . '</td>';
            echo '<td>' . $row["pro_cantidad"]  . '</td>';
            echo '<td>' . $row["total"]  . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<td>No se encontraron resultados.</td>';
    }
    echo '</tr>';


    //******************************** AQUI SE DESCARGA EL EXCEL **************************/
    // Crear una nueva instancia de Spreadsheet
    $conexion->close();
}
