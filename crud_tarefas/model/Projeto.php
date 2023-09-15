<?php
    
    class projeto {

        private ?int $id;
        private ?string $nome;
        private ?string $descProject;
        private ?string $dtInicio;

        public function getId()
        {
                return $this->id;
        }

        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        public function getNome()
        {
                return $this->nome;
        }

        public function setNome($nome)
        {
                $this->nome = $nome;

                return $this;
        }

        public function getDescProject()
        {
                return $this->descProject;
        }
 
        public function setDescProject($descProject)
        {
                $this->descProject = $descProject;

                return $this;
        }

        public function getDtInicio()
        {
                return $this->dtInicio;
        }

        public function setDtInicio($dtInicio)
        {
                $this->dtInicio = $dtInicio;

                return $this;
        }
    }
?>