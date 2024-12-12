<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d39a2c6765.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles/stileRegister.css">
    <style>
        #successMessage{color: red;}
    </style>
</head>
<body>
<!-- Barra de navegación -->
<nav class="navbar" style="display: flex; align-items: center;margin-top: 0; margin-bottom: 0; justify-content: space-between; padding: 0 20px; position: fixed; top: 0; left: 0; width: 100%; z-index: 1000; background-color: red;">
    <!-- Logo -->
    <img src="./resourses/Mechanic.png" alt="Logo" style="height: 150px; width: auto; margin-left: -10px; margin-top: 10px; margin-bottom: 10px;">
    <!-- Menú de navegación -->
    <ul style="display: flex; list-style: none; margin: 0; padding: 0; align-items: center;">
        <li><a href="#">Inicio</a></li>
        <li><a href="./php/misionVision.php">Quienes Somos</a></li>
        <li><a href="#">Contáctanos</a></li>
        <li><a href="#">Acerca de Nosotros</a></li>
    </ul>
    <!-- Campo de búsqueda -->
    <div style="display: flex; align-items: center;">
        <input type="text" placeholder="Buscar..." style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
        <button style="background: none; border: none; padding: 5px; cursor: pointer;">
            <i class="fas fa-search" style="font-size: 18px;"></i>
        </button>
    </div>
</nav>
    <!-- Añadir margen superior al contenido para que no quede cubierto por la barra -->
<div style="margin-top: 200px;">
    <!-- El resto del contenido de la página va aquí -->
</div>

<h4 class="titulo-sistema" style="font-family: 'Helvetica', sans-serif; margin-top:0; font-size: 20px; font-weight: normal; color: #6c757d; text-align: left; letter-spacing: 1px; margin-top: 20px; position: fixed; top: 160px; left: 20px; z-index: 1000; white-space: nowrap;">
    Sistema de Registro y Mantenimiento vehícular - AutoCare
</h4>
<div style="position: relative; display: flex; align-items: center; justify-content: center; gap: 20px;">
    <!-- Imagen -->
    <img loading="lazy" decoding="async" width="1024" height="640"
         src="https://cootranscol.com.co/wp-content/uploads/2024/08/bus-banner-principal-1024x640.png"
         alt="" class="wp-image-1928"
         style="width:736px; height:auto"
         srcset="https://cootranscol.com.co/wp-content/uploads/2024/08/bus-banner-principal-1024x640.png 1024w,
                 https://cootranscol.com.co/wp-content/uploads/2024/08/bus-banner-principal-300x187.png 300w,
                 https://cootranscol.com.co/wp-content/uploads/2024/08/bus-banner-principal-768x480.png 768w,
                 https://cootranscol.com.co/wp-content/uploads/2024/08/bus-banner-principal-1536x960.png 1536w,
                 https://cootranscol.com.co/wp-content/uploads/2024/08/bus-banner-principal-2048x1280.png 2048w"
         sizes="(max-width: 1024px) 100vw, 1024px">

    <!-- Div blanco para tapar el texto -->
    <div style="position: absolute; top: 62%; left: 48%; transform: translate(-50%, -50%); background-color: white; width: 150px; height: 30px;"></div>

    <!-- Card con mensaje -->
    <div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; width: 300px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <h5 style="margin: 0; font-size: 18px; color: #333;">Bienvenido a AutoCare</h5>
        <p style="margin-top: 10px; font-size: 14px; color: #666;">Gestiona el mantenimiento y registro de vehículos de manera fácil y eficiente. ¡Comienza ahora!</p>
    </div>
</div>

<?php
    session_start(); // Iniciar sesión para acceder a las variables de sesión

    // Mostrar el mensaje, si existe
    if (isset($_SESSION['mensaje'])) {
        // Si el tipo de alerta es 'danger', asignamos 'alert-danger', de lo contrario 'alert-info'
        $alertClass = (isset($_SESSION['alert_type']) && $_SESSION['alert_type'] === 'info') ? 'alert-danger' : 'alert-info';

        echo "<div style='background-colort: rgb(253, 253, 253); padding: 10px;'>"; // Contenedor para el div de alerta
        echo "<div class='alert alert-danger' id='successMessage' style='text-align: center;'>" . $_SESSION['mensaje'] . "</div>"; // Mensaje centrado y con clase 'alert-danger'
        echo "</div>";

        // Limpiar el mensaje y el tipo de alerta de la sesión
        unset($_SESSION['mensaje']);
        unset($_SESSION['alert_type']);
    }
?>
    <div class="container" >
        <div class="form-content">
            <h1 id="title">Registro</h1>
            <form id="form" action="./php/procesar.php" method="POST">
                <div class="input-group">
                    <div class="input-field" id="nameInput">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="nombre" placeholder="Nombre" required>
                    </div>
                    <div class="input-field" id="cedula">
                        <i class="fas fa-id-card"></i>
                        <input type="text" name="cedula" placeholder="Número documento" required>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" name="correo" placeholder="Correo" required>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="contrasena" placeholder="Contraseña" required>
                    </div>
                </div>
                <div class="btn-field">
                    <button id="submitBtn" type="submit" name="registro">Registrarse</button>
                </div>
                <div class="link">
                    <p id="toggleBtn">Ya tienes una cuenta? <a href="./php/login.php">Inicia Sesión</a></p>
                </div>
            </form>
        </div>
    </div>
    <footer class="footer">
        <div class="row">
            <ul>
                <li><a href="#">Política de Privacidad</a></li>
                <li><a href="#">Términos y Condiciones</a></li>
                <li><a href="#">Soporte</a></li>
            </ul>
        </div>
    </footer>
   <script src="./Javascript/script.js"></script>
</body>
</html>
