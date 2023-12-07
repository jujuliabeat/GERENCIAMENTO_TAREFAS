<?php
    
//model para Usuario 

require_once(__DIR__."/../util/Connection.php");

class Usuario {

    private ?int $id;
    private ?String $nome;
    private ?String $email;
    private ?String $senhar;
    private ?String $login;

    public function __construct($id=null, $nome=null, $login=null, $senhar=null) {
        $this->id = $id;
        $this->nome = $nome;
        $this->login = $login;
        $this->senhar = $senhar;
    }

    public function getId(): ?int
        {
                return $this->id;
        }

        public function setId(?int $id): self
        {
                $this->id = $id;

                return $this;
        }
        
        public function getNome(): ?String
        {
                return $this->nome;
        }

        public function setNome(?String $nome): self
        {
                $this->nome = $nome;

                return $this;
        }

        public function getEmail(): ?String
        {
                return $this->email;
        }

        public function setEmail(?String $email): self
        {
                $this->email = $email;

                return $this;
        }

        public function getSenhar()
        {
                return $this->senhar;
        }

        public function setSenhar($senhar)
        {
                $this->senhar = $senhar;

                return $this;
        }

        public function getLogin(): ?String
        {
                return $this->login;
        }

        public function setLogin(?String $login): self
        {
                $this->login = $login;

                return $this;
        }
}

?>