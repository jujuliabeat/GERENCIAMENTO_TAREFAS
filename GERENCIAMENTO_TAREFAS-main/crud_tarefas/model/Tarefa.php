<?php

//model para Tarefa 

    require_once(__DIR__ . "/Projeto.php");
    require_once(__DIR__ . "/Usuario.php");
     
    class Tarefa {

        private ?int $id;
        private ?String $titulo;
        private ?String $descricao;
        private ?String $dtCriacao;
        private ?String $trStatus;
        private ?Usuario $usuario;
        private ?Projeto $projeto;
    
        public function __construct() {
            $this->id = 0;
            $this->usuario = null;
            $this->projeto = null;
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
        
        public function getTitulo(): ?String
        {
                return $this->titulo;
        }

        public function setTitulo(?String $titulo): self
        {
                $this->titulo = $titulo;

                return $this;
        }

        public function getDescricao(): ?String
        {
                return $this->descricao;
        }

        public function setDescricao(?String $descricao): self
        {
                $this->descricao = $descricao;

                return $this;
        }

        public function getDtCriacao()
        {
                return $this->dtCriacao;
        }

        public function setDtCriacao($dtCriacao)
        {
                $this->dtCriacao = $dtCriacao;

                return $this;
        }

        public function getTrStatus()
        {
                return $this->trStatus;
        }

    
        public function setTrStatus($trStatus)
        {
                $this->trStatus = $trStatus;

                return $this;
        }

        public function getUsuario()
        {
                return $this->usuario;
        }

        public function setUsuario($usuario)
        {
                $this->usuario = $usuario;

                return $this;
        }

        public function getProjeto()
        {
                return $this->projeto;
        }

        public function setProjeto($projeto)
        {
                $this->projeto = $projeto;

                return $this;
        }
    }
?>