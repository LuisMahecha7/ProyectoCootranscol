<?php
session_start();
ob_start();

// Incluir la clase de conexión
include_once '../php/RegistrarNuevoVehiculo/php/conexion.php';

// Obtener la conexión utilizando la clase Conexion
$conn = Conexion::obtenerConexion();

// Registrar usuario
if (isset($_POST['registro'])) {
    // Sanitizar entradas
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $cedula = mysqli_real_escape_string($conn, $_POST['cedula']);
    $correo = mysqli_real_escape_string($conn, $_POST['correo']);
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Encriptar contraseña

    // Verificar si el correo ya está registrado
    $sql_check_email = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt_check_email = $conn->prepare($sql_check_email);
    $stmt_check_email->bind_param("s", $correo);
    $stmt_check_email->execute();
    $resultado_email = $stmt_check_email->get_result();

    // Verificar si la cédula ya está registrada
    $sql_check_cedula = "SELECT * FROM usuarios WHERE cedula = ?";
    $stmt_check_cedula = $conn->prepare($sql_check_cedula);
    $stmt_check_cedula->bind_param("s", $cedula);
    $stmt_check_cedula->execute();
    $resultado_cedula = $stmt_check_cedula->get_result();

    // Si el correo o la cédula ya existen, mostrar error
    if ($resultado_email->num_rows > 0) {
        $_SESSION['mensaje'] = "El correo ya está registrado. Intente con otro correo o inicie sesión.";
        $_SESSION['alert_type'] = 'danger'; // Tipo de alerta rojo
        header('Location: ../index.php'); // Redirigir al formulario de registro
        exit();
    } elseif ($resultado_cedula->num_rows > 0) {
        $_SESSION['mensaje'] = "Verifique la información, ya hay registro de la cédula ingresada.";
        $_SESSION['alert_type'] = 'danger'; // Tipo de alerta rojo
        header('Location: ../index.php'); // Redirigir al formulario de registro
        exit();
    }

    // Usar prepared statements para evitar inyecciones SQL
    $sql = "INSERT INTO usuarios (nombre, cedula, correo, contrasena) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Vincular parámetros y ejecutar
        $stmt->bind_param("ssss", $nombre, $cedula, $correo, $contrasena);
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
            header('Location: ./registro.php'); // Redirigir al formulario de registro
            exit();
        }
        $stmt->close(); // Cerrar la declaración preparada
    } else {
        // Mensaje de error si la preparación de la consulta falla
        $_SESSION['mensaje'] = "Error en la preparación de la consulta: " . $conn->error;
        $_SESSION['alert_type'] = 'danger'; // Tipo de alerta rojo
        header('Location: ./registro.php'); // Redirigir al formulario de registro
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
                $_SESSION['usuario_cedula'] = $usuario['cedula'];
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
