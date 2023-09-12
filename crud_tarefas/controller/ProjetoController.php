<?php
    // Controller para Curso

    require_once(__DIR__."/../dao/CursoDAO.php");

    class ProjetoController {

        private CursoDAO $cursoDAO;

        public function __construct() {
            $this ->cursoDAO = new CursoDAO();
        }
            
        
        public function listar() {

            return $this->cursoDAO->list();
        }

    }
?>