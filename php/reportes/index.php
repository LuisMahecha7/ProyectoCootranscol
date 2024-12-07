<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REPORTE DE VENCIMIENTOS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    <div class="container">
    <a href="../vistaprincipal.php" id="btnVolver">Menu pricipal</a>
        <div class="row">
            <div class="col-sm-12">
                <h2 class="text-center">Reporte de Vencimientos</h2>
                <h3 class="text-center">Por Rango de Fechas</h3>
            </div>
        </div>
        <br>
        <form action="" method="POST" accept-charset="utf-8" id="filtro-form">

            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="form-label"><b> Fecha Inicio</b></label>
                        <input type="date" name="star" id="star" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="form-label"><b>Fecha Fin</b> </label>
                        <input type="date" name="fin" id="fin" class="form-control" required>
                    </div>
                </div>



                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="form-label"><b>Filtrar</b></label><br>
                        <button type="button" id="filtro" name="filtro" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </div>

                <!-- Boton para generar reporte PDF -->
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="form-label"><b>Reporte</b></label><br>
                        <button onclick="abrirReporte()" class="btn btn-danger"> <i class="fa fa-file-pdf"></i></button>
                    </div>
                </div>
            </div>
        </form>
        <br>
        <div class="row mt-4">
            <div class="col-sm-12">
                <table class="table table-bordered" id="dataTable">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Placa</th>
                            <th>Propietario</th>
                            <th>Documento</th>
                            <th>Fecha Vencimiento</th>
                         <!--   <th>Acciones</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("db.php");
                        $query = "SELECT p.id_vencimiento, p.placa, p.propietario, p.id_cat, p.fecha, 
                        c.categoria FROM vencimientos p INNER JOIN categorias c ON p.id_cat = c.id_categoria";
                        $result = mysqli_query($conexion, $query);
                        while ($fila = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $fila['id_vencimiento']; ?></td>
                                <td><?php echo $fila['placa']; ?></td>
                                <td><?php echo $fila['propietario']; ?></td>
                                <td><?php echo $fila['categoria']; ?></td>
                                <td><?php echo $fila['fecha']; ?></td>
                           <!--      <td>
                               <button type='button' class='btn btn-warning'>
                                        <i class='fa fa-edit'></i>
                                    </button>
                                    <button type='button' class='btn btn-danger'>
                                        <i class='fa fa-trash'></i>
                                    </button>
                                </td> -->
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</body>

<script>
    function abrirReporte() {

        const fechaInicio = document.getElementById('star').value;
        const fechaFin = document.getElementById('fin').value;

        const url = `reporte.php?star=${fechaInicio}&fin=${fechaFin}`;

        window.open(url, '_blank', 'width=800,height=600');
    }
</script>
<script src="script.js"></script>

</html>
