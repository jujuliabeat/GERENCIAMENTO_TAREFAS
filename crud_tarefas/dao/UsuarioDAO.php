<?php
    // Dao para Usuário

    require_once(__DIR__."/../util/Connection.php");
    require_once(__DIR__."/../model/Usuario.php");

    class UsuarioDAO {

        private $conn; 

        public function __construct() {
            $this->conn = Connection::getConnection();
        }
        
        public function list() {
            $sql = "SELECT * FROM usuarios";
            $stm = $this->conn->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll();

            return $this->mapBancoParaObjeto($result);

        }

        private function mapBancoParaObjeto($result) {

            $usuarios = array();
                foreach($result as $reg) {
                    $u = new Usuario();
                    $u->setId($reg['id'])->setNome($reg['nome'])->setEmail($reg['email'])->setSenhar($reg['senhar']);
                
                    array_push($usuarios, $u);
                }

            return $usuarios;
        }

    }
?>