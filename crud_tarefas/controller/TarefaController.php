<?php
    //Controller para Tarefas

    require_once(__DIR__."/../dao/TarefaDAO.php");
    require_once(__DIR__."/../dao/UsuarioDAO.php");
    require_once(__DIR__."/../model/Tarefa.php");
    require_once(__DIR__."/../service/TarefaService.php");
    
    class TarefaController {

        private $tarefaDAO;
        private $tarefaService;

        public function __construct() {
            $this->tarefaDAO =  new TarefaDAO;
            $this->tarefaService =  new TarefaService;
        }

        public function listar() {
           return $this->tarefaDAO->list();
        }
        
        public function exibirFormulario() {
            $usuarioDAO = new UsuarioDAO();
            $usuarios = $usuarioDAO->listarUsuarios(); 
        }

        public function buscarPorId(int $id) {
            return $this->tarefaDAO->findById($id);
        }

        public function inserir(Tarefa $tarefa) {
            // Valida e retorna os erros caso exista
            $erros = $this->tarefaService->validarDados($tarefa);

            if ($erros)
                return $erros;     
                
            // Persiste o objeto e retorna uma array vazia
            $this->tarefaDAO->insert($tarefa);
            return array();
        }

        public function atualizar(Tarefa $tarefa) {
            $erros = $this->tarefaService->validarDados($tarefa);
            if($erros) 
                return $erros;
            
            //Persiste o objeto e retorna um array vazio
            $this->tarefaDAO->update($tarefa);
            return array();
        }
        public function excluirPorId(int $id) {
           $this->tarefaDAO->deleteByID($id);
        }

}
