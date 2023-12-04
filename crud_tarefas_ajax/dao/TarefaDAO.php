<?php
    // DAO para tarefa
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    

    // DAO será com descrições em EN
    require_once(__DIR__ . "/../util/Connection.php");
    require_once(__DIR__ . "/../model/Tarefa.php");
    require_once(__DIR__ . "/../model/Projeto.php");
    require_once(__DIR__ . "/../model/Usuario.php");

    class TarefaDAO{

        private $conn;

        public function __construct() {
            $this->conn = Connection::getConnection();
        }

        public function insert(Tarefa $tarefa) {
            $sql = "INSERT INTO  tarefas (titulo, descricao, dtCriacao, TrStatus, id_projeto, id_usuario)" . 
            " VALUES(?, ?, ?, ?, ?, ?)";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                $tarefa->getTitulo(),
                $tarefa->getDescricao(),
                $tarefa->getDtCriacao(),
                $tarefa->getTrStatus(),
                $tarefa->getProjeto()->getId(),
                $tarefa->getUsuario()->getId()
            ]);
        }

        public function update(Tarefa $tarefa) {
            $conn = Connection::getConnection();
    
            $sql = "UPDATE tarefas SET titulo = ?, descricao = ?,". 
                " dtCriacao = ?, TrStatus = ?, id_projeto = ?, id_usuario = ?".
                " WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                $tarefa->getTitulo(),
                $tarefa->getDescricao(),
                $tarefa->getDtCriacao(),
                $tarefa->getTrStatus(),
                $tarefa->getProjeto()->getId(),
                $tarefa->getUsuario()->getId(),
                $tarefa->getId()
            ]);
        }
    
        public function deleteById(int $id) {
            $conn = Connection::getConnection();
    
            $sql = "DELETE FROM tarefas WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
        }

        public function list() {
            $sql = "SELECT t.*, " . 
                   " u.nome AS nome_usuario, " . 
                   " p.nome AS nome_projeto" . 
                   " FROM tarefas t" .
                   " JOIN usuarios u ON (u.id = t.id_usuario)" . 
                   " JOIN projetos p ON (p.id = t.id_projeto)" . 
                   " ORDER BY t.titulo";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
        
            return $this->mapBancoParaObjeto($result);
        }

        public function findById(int $id) {
            $conn = Connection::getConnection();
    
            $sql = "SELECT a.*," . 
                    " u.nome AS nome_usuario, " . 
                    " p.nome AS nome_projeto" . 
                    " FROM tarefas a" .
                    " JOIN projetos p ON (p.id = a.id_projeto)" .
                    " JOIN usuarios u ON (u.id = a.id_usuario)" .
                    " WHERE a.id = ?";
    
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetchAll();
    
            //Criar o objeto Tarefa
            $tarefass = $this->mapBancoParaObjeto($result);
    
            if(count($tarefass) == 1)
                return $tarefass[0];
            elseif(count($tarefass) == 0)
                return null;
    
            die("TarefaDAO.findById - Erro: mais de uma tarefa".
                    " encontrado para o ID " . $id);
        }
    

        private function mapBancoParaObjeto($result){
            $tarefass = array();
    
            foreach($result as $reg){
                $tarefas = new Tarefa();
                $tarefas->setId($reg['id']);
                $tarefas->setTitulo($reg['titulo']);
                $tarefas->setDescricao($reg['descricao']);
                $tarefas->setDtCriacao($reg['dtCriacao']);
                $tarefas->setTrStatus($reg['TrStatus']);
    
                // Setar o usuário e o projeto
                $usuario = new Usuario();
                $usuario->setId($reg['id_usuario']);
                $usuario->setNome($reg['nome_usuario']);
    
                $projeto = new Projeto();
                $projeto->setId($reg['id_projeto']);
                $projeto->setNome($reg['nome_projeto']);
    
                $tarefas->setUsuario($usuario);
                $tarefas->setProjeto($projeto);
                
                array_push($tarefass, $tarefas);
            }
            return $tarefass;
        }

        public function save(Tarefa $tarefa) {
            $conn = Connection::getConnection();
    
            $sql = "INSERT INTO tarefas (dtCriacao, id_projetos)".
                " VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            
            try {
                $stmt->execute([$tarefa->getDtCriacao(), $tarefa->getProjeto()->getId()]);
            } catch (PDOException $e) {
                return "Erro ao perisitir os dados na base de dados.";
            }
    
            return null;
        }
    }
?>