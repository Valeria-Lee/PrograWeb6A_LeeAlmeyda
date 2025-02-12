<?php
require_once "DataSource.php";
require_once "Usuario.php";
require_once "IDao.php";

class UsuarioDAO implements IDao {
    private $dataSource;

    public function __construct() {
        $this->dataSource = new DataSource();
    }

    public function buscarTodos() {
        
    }

    public function buscar($id) {
        
    }

    public function insertar(Usuario $usuario) {
        
    }

    public function actualizar(Usuario $usuario) {
        
    }

    public function eliminar($id) {
        
    }
}
?>