<?php
class DataSource {
    private $cadenaParaConexion;
    private $conexion;

    public function __construct() {
        try {
            # cambiar a datos de conexion de mi bdd
            $this->cadenaParaConexion = "mysql:host=127.0.0.1;dbname=prueba";
            $this->conexion = new PDO($this->cadenaParaConexion, "root", "root");
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function ejecutarConsulta($sql = "", $values = []) {
        if ($sql !== "") {
            $consulta = $this->conexion->prepare($sql);
            $consulta->execute($values);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return 0;
        }
    }

    public function ejecutarActualizacion($sql = "", $values = []) {
        if ($sql !== "") {
            $consulta = $this->conexion->prepare($sql);
            $consulta->execute($values);
            return $consulta->rowCount();
        } else {
            return 0;
        }
    }
}
?>