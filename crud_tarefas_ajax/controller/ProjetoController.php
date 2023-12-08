<?php
    // Controller para Projeto

    require_once(__DIR__."/../dao/ProjetoDAO.php");

    class ProjetoController {

        private ProjetoDAO $projetoDAO;

        public function __construct() {
            $this ->projetoDAO = new ProjetoDAO();
        }
            
        
        public function listar(int $idUser) {
         
            if ($idUser > 0) {
                return $this->projetoDAO->listByUser($idUser);
            } else {
    
                return $idUser; 
            }
        }

    }
?>