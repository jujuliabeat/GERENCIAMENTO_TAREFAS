<?php
    // DAO para Curso

    require_once(__DIR__."/../util/Connection.php");
    require_once(__DIR__."/../model/Curso.php");

    class CursoDAO {

        private $conn;

        public function __construct() {
            $this->conn = Connection::getConnection();
        }
        
        public function list() {
            $sql = "SELECT * FROM cursos";
            $stm = $this->conn->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll();

            return $this->mapBancoParaObjeto($result);

        }

        private function mapBancoParaObjeto($result) {

            $cursos = array();
                foreach($result as $reg) {
                    $c = new Curso();
                    $c->setId($reg['id'])->setNome($reg['nome'])->setturno($reg['turno']);
                
                    array_push($cursos, $c);
                }

            return $cursos;
        }

    }
?>