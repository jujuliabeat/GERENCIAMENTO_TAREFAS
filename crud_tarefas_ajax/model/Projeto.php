<?php

//model para Projeto

    require_once(__DIR__ . "/Tarefa.php");

    class Projeto {

        private ?int $id;
        private ?String $nome;
        private ?String $descProject;
        private ?String $dtInicio;
    

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

        public function getDescProject(): ?int
        {
                return $this->descProject;
        }

        public function setDescProject(?String $descProject): self
        {
                $this->descProject = $descProject;

                return $this;
        }

        public function getInicio()
        {
                return $this->dtInicio;
        }

        public function setInicio($dtInicio)
        {
                $this->dtInicio = $dtInicio;

             
               return $this;
        }
    } 


?>