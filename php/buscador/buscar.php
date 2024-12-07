<?php
include("db.php");

$search = $_GET['search'];

if (!empty($search)) {
    $query = "SELECT p.id, p.Placa, p.Modelo, p.Marca, p.Interno, p.Propietario
                FROM vehiculos p WHERE p.Propietario LIKE '%$search%' OR p.Placa LIKE '%$search%' OR p.Interno LIKE '%$search%' OR p.Marca LIKE '%$search%' OR p.Modelo LIKE '%$search%'";
} else {
    $query = "SELECT p.id, p.Placa, p.Modelo, p.Marca, p.Interno, p.Propietario
                FROM vehiculos p";
}

$result = mysqli_query($conexion, $query);

$html = "";
while ($fila = mysqli_fetch_assoc($result)) {
    $html .= "<tr>
                <td>{$fila['id']}</td>
                <td>{$fila['Placa']}</td>
                <td>{$fila['Modelo']}</td>
                <td>{$fila['Marca']}</td>
                <td>{$fila['Interno']}</td>
                <td>{$fila['Propietario']}</td>
             <!--  <! <td>
                    <button type='button' class='btn btn-warning'>
                        <i class='fa fa-edit'></i>
                    </button>
                    <button type='button' class='btn btn-danger'>
                        <i class='fa fa-trash'></i>
                    </button>
                </td> -->
              </tr>";
}


echo $html;