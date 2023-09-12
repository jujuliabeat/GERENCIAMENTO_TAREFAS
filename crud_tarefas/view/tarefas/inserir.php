<?php
// View para inserir alunos

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require_once(__DIR__. "/../../controller/AlunoController.php");
    require_once(__DIR__. "/../../model/Aluno.php");
    require_once(__DIR__. "/../../model/Curso.php");


    $msgErro = "";
    $aluno = null;

    if (isset($_POST['submetido'])) {
        // echo 'clicou no gravar';
        $nome = trim($_POST['nome']) ? trim($_POST['nome']) : null;
        $idade = is_numeric($_POST['idade']) ? $_POST['idade'] : null;
        $estrang = trim($_POST['estrang']) ? trim($_POST['estrang']) : null;
        $idCurso = is_numeric($_POST['curso']) ? $_POST['curso'] : null;

        // Criar um Objeto aluno para persistência

        $aluno = new Aluno();
        $aluno->setNome($nome);
        $aluno->setIdade($idade);
        $aluno->setEstrangeiro($estrang);

        if($idCurso) {
            $curso = new Curso();
            $curso->setId($idCurso);
            $aluno->setCurso($curso);
        }


        // Criar um Aluno Controller
        $alunoCont = new AlunoController();
        $erros = $alunoCont->inserir($aluno);

        if(! $erros) {
            // Redirecionar para o listar
            header("location: listar.php");
            exit;

        } else {
            $msgErro = implode("<br>",$erros);
            // print_r($erros);
        }

    }
    
// Inclui o formulario
include_once(__DIR__."/form.php");