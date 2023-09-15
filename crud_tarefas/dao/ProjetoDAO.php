<?php
    // DAO para Curso

    require_once(__DIR__."/../util/Connection.php");
    require_once(__DIR__."/../model/Usuario.php");

    class ProjetoDAO {

        private $conn;

        public function __construct() {
            $this->conn = Connection::getConnection();
        }
        
        public function list() {
            $sql = "SELECT * FROM projetos";
            $stm = $this->conn->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll();

            return $this->mapBancoParaObjeto($result);

        }

        private function mapBancoParaObjeto($result) {

            $tarefas = array();
                foreach($result as $reg) {
                    $t = new Tarefa();
                    $t->setId($reg['id'])->setTitulo($reg['titulo'])->setDescricao($reg['descricao'])->setDtCriacao($reg['dtCriacao'])
                    ->setTrStatus($reg['trStatus'])->setUsuario($reg['usuario'])->setProjeto($reg['projeto']);
                
                    array_push($tarefas, $t);
                }

            return $tarefas;
        }

    }
?>