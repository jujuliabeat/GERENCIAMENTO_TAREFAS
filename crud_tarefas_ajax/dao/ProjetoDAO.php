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
        
        public function listByUser($idUser) {
            $sql = "SELECT p.*, u.nome AS nome_usuario" . 
                " FROM projetos p" .
                " JOIN usuarios u ON (u.id = p.id_usuario)" .
                " WHERE p.id_usuario = ?" . 
                " ORDER BY p.id";
        
            $stm = $this->conn->prepare($sql);
            $stm->execute([$idUser]);
            $result = $stm->fetchAll();
            return $this->mapBancoParaObjeto($result);
        }
    }
?>