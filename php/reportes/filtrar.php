<?php
include("db.php");

$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

$query = "SELECT p.id_vencimiento, p.placa, p.propietario, p.id_cat, p.fecha, c.categoria 
          FROM vencimientos p INNER JOIN categorias c ON p.id_cat = c.id_categoria 
          WHERE DATE (p.fecha) BETWEEN '$start_date' AND '$end_date'";
$result = mysqli_query($conexion, $query);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);