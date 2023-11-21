<?php
    // DAO para Projeto

    require_once(__DIR__."/../util/Connection.php");
    require_once(__DIR__."/../model/Projeto.php");

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

            $projetos = array();
                foreach($result as $reg) {
                    $p = new Projeto();
                    $p->setId($reg['id'])->setNome($reg['nome'])->setDescProject($reg['descProject'])
                    ->setInicio($reg['dtInicio']);
                
                    array_push($projetos, $p);
                }

            return $projetos;
        }

    }
?>