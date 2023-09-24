<?php
    // Controller para Usuario

    require_once(__DIR__."/../dao/UsuarioDAO.php");

    class UsuarioController {

        private UsuarioDAO $usuarioDAO;

        public function __construct() {
            $this ->usuarioDAO = new UsuarioDAO();
        }
            
        
        public function listar() {

            return $this->usuarioDAO->list();
        }

    }
?>