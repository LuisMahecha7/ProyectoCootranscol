<?php
// Cerrar sesión en el servidor
session_start();
session_unset(); // Limpiar las variables de sesión
session_destroy(); // Destruir la sesión

// Establecer un indicador en sessionStorage para JavaScript
echo "<script>
    sessionStorage.setItem('usuarioAutenticado', 'false'); // Establece que el usuario no está autenticado
    window.location.href = './login.php'; // Redirigir al login
</script>";

