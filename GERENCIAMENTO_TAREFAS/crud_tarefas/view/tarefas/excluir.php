<?php

    // View para excluir um aluno 

    require_once (__DIR__."/../../controller/AlunoController.php");


    $idAluno = 0;
    if(isset($_GET['idAluno']))
        $idAluno = $_GET['idAluno'];

    $alunoCont = new AlunoController();
    $aluno = $alunoCont->buscarPorId($idAluno);

    if(! $aluno) {
        echo 'Aluno não encontrado!<br>';
        echo '<a href= "listar.php"> Voltar </a>';
        exit;
    }

    $alunoCont->excluirPorid($aluno->getId());

    // Voltar a listar.php automaticamente
    header("location: listar.php");
