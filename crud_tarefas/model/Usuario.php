<?php


    class Usuario {

        private ?int $id;
        private ?string $nome;
        private ?string $email;
        private ?string $senhar;


        public function __toString()
        {
                return $this->nome. " (" . $this->email . ") ";
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

       
        public function getNome(): ?string
        {
                return $this->nome;
        }

        
        public function setNome(?string $nome): self
        {
                $this->nome = $nome;

                return $this;
        }

        
        public function getEmail(): ?string
        {
                return $this->email;
        }

        
        public function setEmail(?string $email): self
        {
                $this->email = $email;

                return $this;
        }
        
        public function getSenhar(): ?string
        {
                return $this->senhar;
        }

        
        public function setSenhar(?string $senhar): self
        {
                $this->senhar = $senhar;

                return $this;
        }
    }
?>