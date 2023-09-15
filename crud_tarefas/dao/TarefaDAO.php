<?php

    require_once(__DIR__ . "/../util/Connection.php");
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
            $stmt->execute([$tarefa->getTitulo(), $tarefa->getDescricao(), 
                        $tarefa->getDtCriacao(), $tarefa->getTrStatus(), $tarefa->getUsuario(), 
                        $tarefa->getProjeto()]);

        }

        public function update(Tarefa $tarefa) {
            $conn = Connection::getConnection();
    
            $sql = "UPDATE tarefas SET titulo = ?, descricao = ?,". 
                " dtCriacao = ?, TrStatus = ?, id_projeto = ?, id_usuario = ?".
                " WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$tarefa->getTitulo(), $tarefa->getDescricao(), 
                            $tarefa->getDtCriacao(), $tarefa->getTrStatus()->getUsuario(),
                            $tarefa->getProjeto()]);
        }
    
        public function deleteById(int $id) {
            $conn = Connection::getConnection();
    
            $sql = "DELETE FROM tarefas WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
        }

        public function list() {
            $sql = "SELECT a.*," . 
            " c.nome AS nome_usuario, c.turno As turno_curso".
            " FROM tarefas a".
            " JOIN usuario c ON (c.id = a.id_usuario)" . 
            " ORDER BY a.nome";
            $stm = $this->conn->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll();

            return $this->mapBancoParaObjeto($result);

        }

        public function findById(int $id) {
            $conn = Connection::getConnection();
    
            $sql = "SELECT a.*," . 
                    " c.nome AS nome_usuario, c.turno AS turno_curso" . 
                    " FROM tarefas a" .
                    " JOIN usuario c ON (c.id = a.id_usuario)" .
                    " WHERE a.id = ?";
    
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetchAll();
    
            $tarefas = $this->mapBancoParaObjeto($result);
    
            if(count($tarefas) == 1)
                return $tarefas[0];
            elseif(count($tarefas) == 0)
                return null;
    
            die("ProjetoDAO.findById - Erro: mais de uma tarefa".
                    " encontrado para o ID " . $id);
        }
    

        private function mapBancoParaObjeto($result){
            $tarefas = array();

            foreach($result as $reg){
                $tarefa = new Projeto();
                $tarefa->setId($reg['id']);
                $tarefa->setTitulo($reg['titulo']);
                $tarefa->setDescricao($reg['descricao']);
                $tarefa->setDtCriacao($reg['dtCriacao']);

            $curso = new Usuario();
            $curso->setId($reg['id_usuario'])
                    ->setNome($reg['nome_usuario'])
                    ->setTurno($reg['turno_curso']);

            $tarefa->setCurso($curso);
                
            array_push($tarefas, $tarefa);
            }
            return $tarefas;
        }
    }
?>