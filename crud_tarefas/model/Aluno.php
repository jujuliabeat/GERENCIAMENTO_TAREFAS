<?php
// Modelo para aluno
require_once(__DIR__."/Curso.php");

class Aluno {

    private ?int $id;
    private ?string $nome;
    private ?int $idade;
    private ?string $estrangeiro;
    private ?Curso $curso;

    
    public function __construct() {
        $this->id = 0;
        $this->curso = null;
    }

    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome(): ?string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome(?string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of idade
     */
    public function getIdade(): ?int
    {
        return $this->idade;
    }

    /**
     * Set the value of idade
     */
    public function setIdade(?int $idade): self
    {
        $this->idade = $idade;

        return $this;
    }

    /**
     * Get the value of estrangeiro
     */
    public function getEstrangeiro(): ?string
    {
        return $this->estrangeiro;
    }

            public function getEstrangeiroTexto(): ?string
            {
                if ($this->estrangeiro == 'S') 
                    return "Sim";
                 else if ($this->estrangeiro == 'N')
                    return "Não";

                return "";
            }

    /**
     * Set the value of estrangeiro
     */
    public function setEstrangeiro(?string $estrangeiro): self
    {
        $this->estrangeiro = $estrangeiro;

        return $this;
    }

    /**
     * Get the value of curso
     */
    public function getCurso(): ?Curso
    {
        return $this->curso;
    }

    /**
     * Set the value of curso
     */
    public function setCurso(?Curso $curso): self
    {
        $this->curso = $curso;

        return $this;
    }
}