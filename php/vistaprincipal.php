<?php
session_start(); // Iniciar sesión

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario_id'])) {
    // Si el usuario no está logueado, redirigir al login
    header("Location: login.php");
    exit(); // Detener la ejecución
}
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menú a la Izquierda</title>
        <link rel="stylesheet" href="../styles/stileVistaprincipal.css">
    </head>
    <body>

        <!-- Menú -->
        <div class="menu">
            <!-- Logo en la parte superior -->
            <div style="text-align: center;">
                <img src="../resourses/Mechanic.png" alt="Logo" style="width: 270px; height: auto; margin-bottom: 50px;" />
            </div>

            <a href="./RegistrarNuevoVehiculo/php/index.php">Registrar Nuevo Vehículo
            <span class="tooltip">Añadir un nuevo vehículo al sistema</span>
            </a>
                <a href="../php/empleados/index.php">Gestión de empleados
                    <span class="tooltip">Ver y gestionar todos los empleados registrados</span>
                </a>
                <a href="../php/reportes/index.php">Gestión de Reportes
                    <span class="tooltip">Ver el historial de mantenimiento de los vehículos</span>
                </a>
                <a href="../php/buscador/index.php">Filtro de busqueda
                    <span class="tooltip">Registrar un nuevo mantenimiento para un vehículo</span>
                </a>
                <a href="../php/GestionMecanicos/mecanicos.php">Cuenta de usuario
                    <span class="tooltip">Ver alertas sobre mantenimientos próximos</span>
                </a>
             <!--   <a href="#">Gestión de Propietarios
                    <span class="tooltip">Gestionar los propietarios de los vehículos</span>
                </a>
                <a href="./GestionMecanicos/mecanicos.php">Gestionar Mecánicos
                    <span class="tooltip">Gestionar la información de los mecánicos</span>
                </a>
                <a href="#">Informes y Reportes
                    <span class="tooltip">Generar informes y reportes de los mantenimientos</span>
                </a>
                <a href="#">Calendario de Mantenimiento
                    <span class="tooltip">Ver el calendario con los mantenimientos programados</span>
                </a>
                <a href="#">Gestión de Seguros y Vencimientos
                    <span class="tooltip">Gestionar los vencimientos de seguros y otros documentos</span>
                </a>
                <a href="#">Sistema de Notificaciones
                    <span class="tooltip">Configurar el sistema de notificaciones</span>
            </a>-->

        </div>
        <div class="cootranscol2024" style="
            position: fixed; 
            bottom: 10px; 
            left: 50%; 
            transform: translateX(-50%);
            font-family: Arial, sans-serif; 
            font-size: 14px;
            color: #666;
            text-align: center;
        ">
    <h4>
        <span style="font-style: italic; font-weight: bold; color: #333;">Asociados Inc-Soft. 2024 - Todos los derechos reservados.</span>
    </h4>
</div>


        <!-- Contenido principal -->
        <div class="main-content">
            <!-- Mostrar el saludo con el nombre del usuario -->
            <p class="user">
            Bienvenid@-User- <?php echo $_SESSION['usuario_nombre']; ?>
                <button class="logout-btn" onclick="logout()" style="margin-left: 25px; border-radius: 10px; padding: 6px 6px">Cerrar sesión</button>
            </p>
        </div>

        <!-- Spinner de carga y mensaje, inicialmente ocultos -->
        <div id="spinner-container" class="spinner-container">
            <div class="spinner"></div>
            <p>Redirigiendo...</p>
        </div>
        <script src="../Javascript/vistaprincipal.js"></script>
    </body>
</html>
