<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link type="text/css" rel="stylesheet" href="../css/index.css">
        <?php include('./Principal.php'); ?>
        <style>
            #btnVolver {
                position: absolute;
                top: 10px;
                left: 10px;
                padding: 10px 20px;
                background-color: #007bff;
                color: white;
                border: none;
                border-radius: 5px;
                text-decoration: none;
                font-size: 14px;
                font-family: Arial, sans-serif;
                cursor: pointer;
            }
            #btnVolver:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <header>
            <a href="../../vistaprincipal.php" id="btnVolver">Vista pricipal</a>
            <div id="encabezado">
                SISTEMA CONTROL DE MANTENIMIENTOS - "AutoCare"
            </div>
        </header>
        <selection>
            <div id="principal">
                <div id="form">
                <form action="index.php" method="POST" name="form">
                        <input type="hidden" name="txtID" id="txtID" value='<?php echo $vehiculo->id; ?>'/><br/><br/>

                        <label for="txtPlaca">Placa:</label>
                        <input type="text" name="txtPlaca" id="txtPlaca" value='<?php echo $vehiculo->placa; ?>' placeholder="Placa del vehículo">
                        <br/><br/>
                        <label for="txtMarca">Marca:</label>
                        <input type="text" name="txtMarca" id="txtMarca" value='<?php echo $vehiculo->marca; ?>' placeholder="Marca del vehículo">
                        <br/><br/>
                        <label for="txtModelo">Modelo:</label>
                        <input type="text" name="txtModelo" id="txtModelo" value='<?php echo $vehiculo->modelo; ?>' placeholder="Modelo del vehículo">
                        <br/><br/>
                        <label for="txtinterno">Interno:</label>
                        <input type="text" name="txtInterno" id="txtInterno" value='<?php echo $vehiculo->interno; ?>' placeholder="Número Interno">
                        <br/><br/>
                        <label for="txtPropietario">Propietario:</label>
                        <input type="text" name="txtPropietario" id="txtPropietario" value='<?php echo $vehiculo->propietario; ?>' placeholder="Propietario del vehículo">
                        <br/><br/>
                        <button type="submit"> Guardar </button>
                        <button onclick="window.location ='index.php'"> Nuevo </button>
                        <br/><br/>
                    </form>

                </div>
                <div id="tabla">
                    <fieldset>
                        <legend>Vehículos</legend>
                        <table id="tbDatos">
                            <thead>
                                <tr>
                                    <th>Número</th>
                                    <th>Placa</th>
                                    <th>Modelo</th>
                                    <th>Marca</th>
                                    <th>Interno</th>
                                    <th>Propietario</th>
                                    <th>Borrar</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $vehiculo->listarDatos(); ?>
                            </tbody>
                        </table>
                    </fieldset>
                </div>
            </div>
        </selection>
        <div id="footer">
            "Cootranscol" 2024...
        </div>
    </body>
</html>
