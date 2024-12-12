<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Iniciar Sesión</title>
        <link rel="stylesheet" href="../styles/styleLogin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" crossorigin="anonymous">
        <style>
            /* Redes sociales */
            .social-icons {
                display: flex;
                justify-content: center;
                gap: 10px; /* Espaciado entre íconos */
                margin-top: 10px;
            }

            .social-icons i {
                font-size: 1.5em; /* Tamaño más pequeño */
                color: #444; /* Color base */
                transition: color 0.3s;
            }

            .social-icons a:hover i {
                color: #007bff; /* Color al pasar el mouse */
            }

            /* Colores específicos para Twitter e Instagram */
            .social-icons .fa-twitter {
                color: #1DA1F2;
            }

            .social-icons .fa-instagram {
                color: #E4405F;
            }

            .social-icons .fa-facebook {
                color: #1877F2;
            }

            /* General */
            body {
                font-family: Arial, sans-serif;
            }

            .footer {
                text-align: center;
                margin-top: 20px;
            }

            .footer ul {
                list-style: none;
                padding: 0;
            }

            .footer ul li {
                display: inline;
                margin: 0 10px;
            }

            .footer ul li a {
                text-decoration: none;
                color: #007bff;
            }
        </style>
    </head>
    <body>
        <!-- Barra de navegación -->
        <nav class="navbar" style="display: flex; align-items: center; justify-content: space-between; padding: 0 20px; position: fixed; top: 0; left: 0; width: 100%; z-index: 1000; background-color: red;">
            <!-- Logo -->
            <img src="../resourses/Mechanic.png" alt="Logo" style="height: 150px; width: auto; margin-left: -10px; margin-top: 10px; margin-bottom: 10px;">
            
            <!-- Menú de navegación -->
            <ul style="display: flex; list-style: none; margin: 0; padding: 0; align-items: center;">
                <li><a href="#">Inicio</a></li>
                <li><a href="./misionVision.php">Quienes Somos</a></li>
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

        <h4 class="titulo-sistema" style="font-family: 'Helvetica', sans-serif; font-size: 20px; font-weight: normal; color: #6c757d; text-align: left; letter-spacing: 1px; margin-top: 20px; position: fixed; top: 160px; left: 20px; z-index: 1000; white-space: nowrap;">
            Sistema de Registro y Mantenimiento vehícular - AutoCare
        </h4>
            <?php
            session_start(); // Iniciar sesión para acceder a las variables de sesión

            // Mostrar el mensaje, si existe
            if (isset($_SESSION['mensaje'])) {
                // Si el tipo de alerta es 'danger', asignamos 'alert-danger', de lo contrario 'alert-success'
                $alertClass = (isset($_SESSION['alert_type']) && $_SESSION['alert_type'] === 'info') ? 'alert-danger' : 'alert-info';
                echo "<div style='background-color: rgb(253, 253, 253); padding: 10px;'>"; // Contenedor para el div de alerta
                echo "<div class='alert $alertClass' id='successMessage'>" . $_SESSION['mensaje'] . "</div>";
                echo "</div>";
                
                
                // Limpiar el mensaje y el tipo de alerta de la sesión
                unset($_SESSION['mensaje']);
                unset($_SESSION['alert_type']);
            }
            ?>
        
            <div class="container">
                <div class="form-content" style="padding-bottom: 0;">
                    <h1 id="title">Iniciar Sesión</h1>
                    <form id="loginForm" action="./procesar.php" method="POST">
                        <div class="input-group">
                            <div class="input-field">
                                <i class="fa-solid fa-envelope"></i>
                                <input type="email" name="correo" placeholder="Correo" required>
                            </div>
                            <div class="input-field">
                                <i class="fa-solid fa-lock"></i>
                                <input type="password" name="contrasena" placeholder="Contraseña" required>
                            </div>
                        </div>
                        <div class="btn-field" style="padding-bottom: 20px">
                            <button type="submit" name="login" id="btnlogin">Iniciar Sesión</button>
                        </div>
                
                        <!-- Redes sociales -->
                        <div class="social-icons" style="display: flex; align-items: center; padding-bottom: 20px; margin-left: 20px;">
                            <p class="linktwo" id="" style="margin-right: 10px; white-space: nowrap;">Aún no tienes una cuenta? <a class="linktwo" href="../index.php">Regístrate</a></p>

                            <a href="https://www.facebook.com/p/Cootranscol-100063821919879/?locale=es_LA&_rdr" target="_blank">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="https://twitter.com/tu_pagina" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://instagram.com/tu_pagina" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
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
            <script src="../Javascript/script.js"></script>
    </body>
</html>
