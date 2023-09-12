<?php
    // DAO para Aluno
    // DAO será com descrições em EN
    require_once(__DIR__ . "/../util/Connection.php");
    require_once(__DIR__ . "/../model/Aluno.php");
    require_once(__DIR__ . "/../model/Curso.php");

    class AlunoDAO{

        private $conn;

        public function __construct() {
            $this->conn = Connection::getConnection();
        }

        public function insert(Aluno $aluno) {
            $sql = "INSERT INTO  alunos (nome, idade, estrangeiro, id_curso)" . 
            " VALUES(?, ?, ?, ?)";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$aluno->getNome(), $aluno->getIdade(), 
                        $aluno->getEstrangeiro(), $aluno->getCurso()->getId()]);

        }

        public function update(Aluno $aluno) {
            $conn = Connection::getConnection();
    
            $sql = "UPDATE alunos SET nome = ?, idade = ?,". 
                " estrangeiro = ?, id_curso = ?".
                " WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$aluno->getNome(), $aluno->getIdade(), 
                            $aluno->getEstrangeiro(), $aluno->getCurso()->getId(),
                            $aluno->getId()]);
        }
    
        public function deleteById(int $id) {
            $conn = Connection::getConnection();
    
            $sql = "DELETE FROM alunos WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
        }

        public function list() {
            $sql = "SELECT a.*," . 
            " c.nome AS nome_curso, c.turno As turno_curso".
            " FROM alunos a".
            " JOIN cursos c ON (c.id = a.id_curso)" . 
            " ORDER BY a.nome";
            $stm = $this->conn->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll();

            return $this->mapBancoParaObjeto($result);

        }

        public function findById(int $id) {
            $conn = Connection::getConnection();
    
            $sql = "SELECT a.*," . 
                    " c.nome AS nome_curso, c.turno AS turno_curso" . 
                    " FROM alunos a" .
                    " JOIN cursos c ON (c.id = a.id_curso)" .
                    " WHERE a.id = ?";
    
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetchAll();
    
            //Criar o objeto Aluno
            $alunos = $this->mapBancoParaObjeto($result);
    
            if(count($alunos) == 1)
                return $alunos[0];
            elseif(count($alunos) == 0)
                return null;
    
            die("AlunoDAO.findById - Erro: mais de um aluno".
                    " encontrado para o ID " . $id);
        }
    

        private function mapBancoParaObjeto($result){
            $alunos = array();

            foreach($result as $reg){
                $aluno = new Aluno();
                $aluno->setId($reg['id']);
                $aluno->setNome($reg['nome']);
                $aluno->setIdade($reg['idade']);
                $aluno->setEstrangeiro($reg['estrangeiro']);

            $curso = new Curso();
            $curso->setId($reg['id_curso'])
                    ->setNome($reg['nome_curso'])
                    ->setTurno($reg['turno_curso']);

            $aluno->setCurso($curso);
                
            array_push($alunos, $aluno);
            }
            return $alunos;
        }
    }
?>