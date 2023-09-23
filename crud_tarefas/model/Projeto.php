<?php

//model para Tarefa 

    require_once(__DIR__ . "/Tarefa.php");

    class Projeto {

        private ?int $id;
        private ?string $nome;
        private ?string $descProject;
        private ?string $dtInicio;
    

        public function getId(): ?int
        {
                return $this->id;
        }

        public function setId(?int $id): self
        {
                $this->id = $id;

                return $this;
        }
        
        public function getNome(): ?int
        {
                return $this->nome;
        }

        public function setNome(?int $nome): self
        {
                $this->nome = $nome;

                return $this;
        }

        public function getDescProjevt(): ?int
        {
                return $this->descProject;
        }

        public function setDescProjevt(?int $descProject): self
        {
                $this->descProject = $descProject;

                return $this;
        }

        public function getInicio()
        {
                return $this->dtInicio;
        }

        public function setDtCriacao($dtInicio)
        {
                $this->dtInicio = $dtInicio;

             
               return $this;
        }
    } 


?>