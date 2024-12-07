<?php
session_start();

// Incluir la clase de conexión
include_once '../RegistrarNuevoVehiculo/php/conexion.php'; // Asegúrate de que la ruta es correcta

// Verifica si la cédula está guardada en la sesión
if (isset($_SESSION['usuario_cedula'])) {
    $cedula = $_SESSION['usuario_cedula'];

    // Obtener la conexión a la base de datos usando la clase Conexion
    $conexion = Conexion::obtenerConexion();

    // Realiza la consulta para obtener los datos del usuario
    $query = "SELECT * FROM usuarios WHERE cedula = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("s", $cedula); // Aquí se vincula el parámetro

    $stmt->execute();
    $result = $stmt->get_result();

    // Obtén el resultado de la consulta
    if ($usuario = $result->fetch_assoc()) {
        $nombre = $usuario['nombre'];
        $correo = $usuario['correo'];
        $contrasena = $usuario['contrasena'];
    } else {
        $nombre = '';
        $correo = '';
        $contrasena = '';
    }

    $stmt->close(); // Cierra el statement
} else {
    $nombre = '';
    $correo = '';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="mecanico.css">
    <style>
    
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #bae4de;
    }

    .form-container {
    width: 80%;
    max-width: 600px;
    background: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .form-row {
    display: flex;
    gap: 20px;
    margin-bottom: 15px;
    }

    .form-group {
    flex: 1;
    display: flex;
    flex-direction: column;
    }

    label {
    margin-bottom: 5px;
    font-weight: bold;
    font-size: 14px;
    color: #333;
    }

    input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    }

    input:focus {
    outline: none;
    border-color: #007bff;
    box-shadow: 0 0 3px rgba(0, 123, 255, 0.5);
    }

    .form-button {
    text-align: center;
    }

    button {
    padding: 10px 20px;
    border: none;
    background-color: #007bff;
    color: white;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    }

    button:hover {
    background-color: #0056b3;
    }
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
#btnVolver:hover {background-color: #0056b3;}
</style>
</head>
<body>

<div class="container mt-5">
<a href="../vistaprincipal.php" id="btnVolver">Menu pricipal</a>
    <h2>Datos del Usuario</h2>
    
    <form action="" method="POST">
    <div class="form-row">
        <div class="form-group">
            <label for="cedula">Cédula</label>
            <input type="text" id="cedula" name="cedula" value="<?php echo htmlspecialchars($cedula); ?>" placeholder="Ingrese su cédula" disabled>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" placeholder="Ingrese su nombre">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" id="correo" name="correo" value="<?php echo htmlspecialchars($correo); ?>" placeholder="Ingrese su correo">
        </div>
        <div class="form-group">
            <label for="contrasena">Contraseña</label>
            <input type="password" id="contrasena" name="contrasena" value="<?php echo htmlspecialchars($contrasena); ?>" placeholder="Ingrese su contraseña" disabled>
        </div>
    </div>

    <!-- Campos ocultos inicialmente para actualizar la contraseña -->
    <div class="form-row" id="actualizar-contrasena-campos" style="display: none;">
        <div class="form-group">
            <label for="contrasena_actual">Contraseña Actual</label>
            <input type="password" id="contrasena_actual" name="contrasena_actual" placeholder="Ingrese su contraseña actual">
        </div>
        <div class="form-group">
            <label for="nueva_contrasena">Nueva Contraseña</label>
            <input type="password" id="nueva_contrasena" name="nueva_contrasena" placeholder="Ingrese su nueva contraseña">
        </div>
    </div>
    <div class="form-row" id="actualizar-contrasena-campos-dos" style="display: none;">
        <div class="form-group">
            <label for="confirmar_contrasena">Confirmar Nueva Contraseña</label>
            <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" placeholder="Confirme su nueva contraseña">
        </div>
        <div class="form-group" style="visibility: hidden;">
            <label for="confirmar_contrasena">Confirmar Nueva Contraseña</label>
            <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" placeholder="Confirme su nueva contraseña">
        </div>
    </div>

    <!-- Botones -->
    <div id="botones-iniciales">
        <button type="submit" class="btn btn-primary btn-sm">Actualizar Datos</button>
        <button type="button" class="btn btn-dark btn-sm" id="boton-actualizar-contrasena">Actualizar Contraseña</button>
    </div>
    <div id="botones-actualizacion" style="display: none;">
        <button type="submit" class="btn btn-primary btn-sm">Actualizar Datos</button>
        <button type="button" class="btn btn-danger btn-sm" id="boton-cancelar">Cancelar</button>
    </div>
</form>


</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const botonActualizarContrasena = document.getElementById('boton-actualizar-contrasena');
        const botonCancelar = document.getElementById('boton-cancelar');
        const camposContrasena = document.getElementById('actualizar-contrasena-campos');
        const camposContrasenaDos = document.getElementById('actualizar-contrasena-campos-dos');
        const botonesIniciales = document.getElementById('botones-iniciales');
        const botonesActualizacion = document.getElementById('botones-actualizacion');

        botonActualizarContrasena.addEventListener('click', function () {
            camposContrasena.style.display = 'flex';
            camposContrasenaDos.style.display = 'flex';
            botonesIniciales.style.display = 'none';
            botonesActualizacion.style.display = 'flex';
        });

        botonCancelar.addEventListener('click', function () {
            camposContrasena.style.display = 'none';
            camposContrasenaDos.style.display = 'none';
            botonesIniciales.style.display = 'flex';
            botonesActualizacion.style.display = 'none';
        });
    });
</script>


</body>
</html>
