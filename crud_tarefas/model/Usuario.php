<?php
    
//model para Usuario 

require_once(__DIR__."/../util/Connection.php");

class Usuario {

    private ?int $id;
    private ?String $nome;
    private ?String $email;
    private ?String $senhar;

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

        public function setNome(?int $nome): self
        {
                $this->nome = $nome;

                return $this;
        }

        public function getEmail(): ?int
        {
                return $this->email;
        }

        public function setEmail(?int $email): self
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