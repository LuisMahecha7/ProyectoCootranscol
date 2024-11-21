<?php
session_start(); // Iniciar sesión para usar variables de sesión
ob_start(); // Iniciar el búfer de salida para evitar cualquier salida previa

// Configuración de la conexión
$host = 'localhost';
$usuario = 'root';
$password = '';
$base_datos = 'CootranscolDb';

$conn = new mysqli($host, $usuario, $password, $base_datos);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Registrar usuario
if (isset($_POST['registro'])) {
    // Sanitizar entradas
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $correo = mysqli_real_escape_string($conn, $_POST['correo']);
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Encriptar contraseña

    // Usar prepared statements para evitar inyecciones SQL
    $sql = "INSERT INTO usuarios (nombre, correo, contrasena) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Vincular parámetros y ejecutar
        $stmt->bind_param("sss", $nombre, $correo, $contrasena);
        if ($stmt->execute()) {
            // Mensaje de éxito en la sesión
            $_SESSION['mensaje'] = "Registro exitoso. Ahora puedes iniciar sesión.";
            $_SESSION['alert_type'] = 'success'; // Tipo de alerta verde

            // Redirigir al formulario de inicio de sesión
            header('Location: ./login.php');
            exit();
        } else {
            // Mensaje de error en la sesión si la consulta falla
            $_SESSION['mensaje'] = "Error al registrar usuario. Intente nuevamente.";
            $_SESSION['alert_type'] = 'danger'; // Tipo de alerta rojo
            header('Location: ./login.php');
            exit();
        }
        $stmt->close(); // Cerrar la declaración preparada
    } else {
        // Mensaje de error si la preparación de la consulta falla
        $_SESSION['mensaje'] = "Error en la preparación de la consulta: " . $conn->error;
        $_SESSION['alert_type'] = 'danger'; // Tipo de alerta rojo
        header('Location: ./login.php');
        exit();
    }
}

// Inicio de sesión
if (isset($_POST['login'])) {
    // Sanitizar entradas
    $correo = mysqli_real_escape_string($conn, $_POST['correo']);
    $contrasena = $_POST['contrasena'];

    // Usar prepared statements para evitar inyecciones SQL
    $sql = "SELECT * FROM usuarios WHERE correo=?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Vincular parámetros y ejecutar
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();
            if (password_verify($contrasena, $usuario['contrasena'])) {
                // Guardar información del usuario en la sesión
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nombre'] = $usuario['nombre']; // Guardar el nombre del usuario
                // Redirigir al usuario a la vista principal
                header('Location: vistaprincipal.php');
                exit();
            } else {
                // Configurar el mensaje de error y el tipo de alerta como "danger"
                $_SESSION['mensaje'] = "Contraseña incorrecta. Verifica las credenciales.";
                $_SESSION['alert_type'] = "danger"; // Tipo de alerta rojo
                header('Location: login.php'); // Redirigir al login
                exit();
            }
        } else {
            // Configurar el mensaje de error y el tipo de alerta como "danger"
            $_SESSION['mensaje'] = "No se encontró una cuenta con ese correo.";
            $_SESSION['alert_type'] = "danger"; // Tipo de alerta rojo
            header('Location: login.php'); // Redirigir al login
            exit();
        }
        $stmt->close(); // Cerrar la declaración preparada
    } else {
        // Mensaje de error si la preparación de la consulta falla
        $_SESSION['mensaje'] = "Error al preparar la consulta de inicio de sesión.";
        $_SESSION['alert_type'] = 'danger'; // Tipo de alerta rojo
        header('Location: login.php');
        exit();
    }
}

$conn->close();
?>
