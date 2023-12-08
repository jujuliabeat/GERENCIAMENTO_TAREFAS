<?php
    // Controller para Usuario

    require_once(__DIR__."/../dao/UsuarioDAO.php");
    require_once(__DIR__."/../model/Usuario.php");
    require_once(__DIR__."/../service/UsuarioService.php");

    class UsuarioController {

        private $usuarioDAO;
        private $usuarioService;

        public function __construct() {
            $this ->usuarioDAO = new UsuarioDAO();
            $this ->usuarioService = new UsuarioService();
        }
            
        
        public function listarUsuarios() {

            return $this->usuarioDAO->listarUsuarios();
        }
        public function buscarPorId(int $id) {
            return $this->usuarioDAO->findById($id);
        }

        public function inserir(Usuario $usuario) {
            // Valida e retorna os erros caso exista
            $erros = $this->usuarioService->validarDados($usuario);

            if ($erros)
                return $erros;     
                
            // Persiste o objeto e retorna uma array vazia
            $this->usuarioDAO->insert($usuario);
            return array();
        }

        public function atualizar(Usuario $usuario) {
            $erros = $this->usuarioService->validarDados($usuario);
            if($erros) 
                return $erros;
            
            //Persiste o objeto e retorna um array vazio
            $this->usuarioDAO->update($usuario);
            return array();
        }
        public function excluirPorId(int $id) {
           $this->usuarioDAO->deleteByID($id);
        }
    }
?>