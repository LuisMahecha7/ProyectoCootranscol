<?php
class Conexion {
    private static $instancia = null;
    private static $conexion = null;

    // Definir las constantes dentro de la clase
    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_NAME = 'CootranscolDb';

    // Hacer el constructor privado para evitar que se instancie la clase directamente
    private function __construct() {}

    // Método para obtener la instancia de la conexión
    public static function obtenerConexion() {
        if (self::$instancia == null) {
            self::$instancia = new Conexion();
            self::$conexion = mysqli_connect(self::DB_HOST, self::DB_USER, self::DB_PASS, self::DB_NAME)
                or die("Problemas de conexión");
        }
        return self::$conexion;
    }

    // Destructor para cerrar la conexión cuando se destruya la instancia
    public function __destruct() {
        mysqli_close(self::obtenerConexion());
    }
}
?>