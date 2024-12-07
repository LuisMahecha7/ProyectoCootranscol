<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador</title>
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
<a href="../vistaprincipal.php" id="btnVolver">Menu pricipali</a>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center">BUSCAR VEHÍCULO Y/O PROPIETARIO</h2>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-sm-12">
                <label for="search">Buscar:</label>
                <input type="text" class="form-control" id="search" name="search" placeholder="Escriba lo que desea buscar...">
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-sm-12">
                <table class="table table-bordered" id="dataTable">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Placa</th>
                            <th>Modelo</th>
                            <th>Marca</th>
                            <th>Interno</th>
                            <th>Propietario</th>
                        <!--    <th>Acciones</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Mostrar Datos de busqueda.... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            cargarTabla();
            $("#search").on("input", function() {
                var searchValue = $(this).val().trim();
                if (searchValue !== "") {
                    buscar(searchValue);
                } else {
                    cargarTabla();
                }
            });

            function buscar(searchValue) {
                $.ajax({
                    url: "buscar.php",
                    type: "GET",
                    data: {
                        search: searchValue
                    },
                    success: function(response) {
                        if (response.trim() === "") {
                            alert("No se encontraron coincidencias..");
                        }
                        $("#dataTable tbody").html(response);
                    }
                });
            }

            function cargarTabla() {
                $.ajax({
                    url: "buscar.php",
                    type: "GET",
                    data: {
                        search: ""
                    },
                    success: function(response) {
                        $("#dataTable tbody").html(response);
                    }
                });
            }
        });
    </script>
</body>

</html>