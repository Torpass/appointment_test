<?php
class ConexionSQL {
    private $usuario = "root";
    private $contraseña = "torpas_313";
    private $base_datos = "appointment_test";
    private $servidor = "localhost"; 
    protected $conexion;

    function getConnection(): PDO {
        return $this->conexion;
    }

    public function __construct() {
        $dsn = "mysql:host=$this->servidor;dbname=$this->base_datos;charset=utf8mb4";
        try {
            $this->conexion = new PDO($dsn, $this->usuario, $this->contraseña);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
?>
