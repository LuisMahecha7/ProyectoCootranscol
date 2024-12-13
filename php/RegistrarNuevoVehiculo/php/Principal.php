<?php

include('../config/config.php');
include('./conexion.php');
include('./Vehiculo.php');

$vehiculo = new Vehiculo();

if ($_POST) {
    $placa = trim(isset($_POST['txtPlaca']) ? $_POST['txtPlaca'] : "");
    $modelo = trim(isset($_POST['txtModelo']) ? $_POST['txtModelo'] : "");
    $marca = trim(isset($_POST['txtMarca']) ? $_POST['txtMarca'] : "");
    $interno = trim(isset($_POST['txtInterno']) ? $_POST['txtInterno'] : "");
    $propietario = trim(isset($_POST['txtPropietario']) ? $_POST['txtPropietario'] : "");
    $id = $_POST['txtID'];
    $contador = 0;

    if (empty($placa)) {
        echo "<script>alert('Por favor ingrese la PLACA del vehículo');</script>";
        $contador++;
    }
    if (empty($modelo)) {
        echo "<script>alert('Por favor ingrese el MODELO del vehículo');</script>";
        $contador++;
    }
    if (empty($marca)) {
        echo "<script>alert('Por favor ingrese la MARCA del vehículo');</script>";
        $contador++;
    }
    if (empty($interno)) {
        echo "<script>alert('Por favor ingrese el NÚMERO INTERNO del vehículo');</script>";
        $contador++;
    }
    if (empty($propietario)) {
        echo "<script>alert('Por favor ingrese el nombre del PROPIETARIO del vehículo');</script>";
        $contador++;
    }

    if ($contador === 0) {
        $vehiculo->id = $id;
        $vehiculo->placa = $placa;
        $vehiculo->modelo = $modelo;
        $vehiculo->marca = $marca;
        $vehiculo->interno = $interno;
        $vehiculo->propietario = $propietario;
        $vehiculo->guardarDatos();
    }
} elseif (isset($_GET['borrar'])) {
    $id = $_GET['borrar'];
    $vehiculo->borrarDatos($id);
} elseif (isset($_GET['modificar'])) {
    $id = $_GET['modificar'];
    $vehiculo->cargarDatos($id);
}
?>
