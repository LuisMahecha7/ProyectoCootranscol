<?php
include("db.php");

$fechaInicio = $_GET['star'] ?? null;
$fechaFin = $_GET['fin'] ?? null;

$query = "SELECT p.id_vencimiento, p.placa, p.propietario, p.id_cat, p.fecha, 
 c.categoria FROM vencimientos p INNER JOIN categorias c ON p.id_cat = c.id_categoria";

if ($fechaInicio && $fechaFin) {
    $query .= " WHERE p.fecha BETWEEN '$fechaInicio' AND '$fechaFin'";
}

$result = mysqli_query($conexion, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<style>
    @media print {
        @page {
            size: letter landscape;
            margin: 1cm;
        }

        .table {
            width: 100%;
            font-size: 12px;
        }

        .table th,
        .table td {
            padding: 8px;
        }
    }
</style>

<body onload="window.print()">
    <h2>Reporte De Vencimientos</h2>
    <table class="table table-bordered" id="dataTable">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Placa</th>
                <th>Propietario</th>
                <th>Categoría</th>
                <th>Fecha</th>
       
            </tr>
        </thead>
        <tbody>
            <?php while ($fila = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?php echo $fila['id_vencimiento']; ?></td>
                    <td><?php echo $fila['placa']; ?></td>
                    <td><?php echo $fila['propietario']; ?></td>
                    <td><?php echo $fila['categoria']; ?></td>
                    <td><?php echo $fila['fecha']; ?></td>
                </tr>
            <?php
            endwhile;
            ?>
        </tbody>
    </table>
</body>

</html>