<?php

// DAO para Usuarios
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    // Dao para Usuário

    require_once(__DIR__."/../util/Connection.php");
    require_once(__DIR__."/../model/Usuario.php");

    class UsuarioDAO {

        private $conn; 

        public function __construct() {
            $this->conn = Connection::getConnection();
        }

        public function insert(Usuario $usuario) {
            $sql = "INSERT INTO  usuarios (nome, email, senha)" . 
            " VALUES(?, ?, ?)";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$usuario->getNome(), $usuario->getEmail(), 
                        $usuario->getSenhar()]);

        }

        public function update(Usuario $usuario) {
            $conn = Connection::getConnection();
    
            $sql = "UPDATE usuarios SET nome = ?, email = ?,". 
                " senha = ?".
                " WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$usuario->getNome(), $usuario->getEmail(), 
                        $usuario->getSenhar()]);
        }
        

        public function deleteById(int $id) {
            $conn = Connection::getConnection();
    
            $sql = "DELETE FROM usuarios WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
        }
        
        public function listarUsuarios() {
            $sql = "SELECT * FROM usuarios";
            $stm = $this->conn->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll();

            return $this->mapBancoParaObjeto($result);

        }

        public function findById(int $id) {
            $conn = Connection::getConnection();
    
            $sql = "SELECT a.*," . 
                    " u.nome AS nome_usuarios" . 
                    " FROM usuarios a" .
                    " JOIN usuarios u ON (u.id = a.id_usuarios)" .
                    " WHERE a.id = ?";
    
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetchAll();
    
            //Criar o objeto Usuario
            $usuarios = $this->mapBancoParaObjeto($result);
    
            if(count($usuarios) == 1)
                return $usuarios[0];
            elseif(count($usuarios) == 0)
                return null;
    
            die("UsuarioDAO.findById - Erro: mais de um Usuario".
                    " encontrado para o ID " . $id);
        }
    


        private function mapBancoParaObjeto($result) {

            $usuarios = array();
                foreach($result as $reg) {
                    $u = new Usuario();
                    $u->setId($reg['id'])->setNome($reg['nome'])->setEmail($reg['email'])
                    ->setSenhar($reg['senha']);
                
                    array_push($usuarios, $u);
                }

            return $usuarios;
        }

    }
?>