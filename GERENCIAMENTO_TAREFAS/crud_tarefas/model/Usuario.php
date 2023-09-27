<?php
    
//model para Usuario 

require_once(__DIR__."/../util/Connection.php");

class Usuario {

    private ?int $id;
    private ?String $nome;
    private ?String $email;
    private ?String $senhar;

    public function __construct() {
        $this->id = 0;
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
}

?>