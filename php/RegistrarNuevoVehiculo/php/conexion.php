<?php
    class Conexion{
        private static $instancia = null;
        private static $conexion = null;

        private function __contruct(){}

        public static function obtenerConexion(){
            if(self::$instancia == null){
                self::$instancia = new Conexion();
                self::$conexion = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)
                    or die("problemas De Conexión");
            }
            return self::$conexion;
        }

        public function __destruct(){
            mysqli_close(Conexion::obtenerConexion());
        }
    }

?>