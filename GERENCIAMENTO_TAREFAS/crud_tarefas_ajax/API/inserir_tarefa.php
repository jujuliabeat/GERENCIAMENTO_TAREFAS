<?php

    require_once (__DIR__."/../controller/TarefaController.php");
    require_once (__DIR__."/../model/Tarefa.php");
    require_once (__DIR__."/../model/Projeto.php");

    // Capturar os parâmentros POST 
    $titulo = is_numeric($_POST['titulo']) ? $_POST['titulo'] : null;
    $descricao = is_numeric($_POST['descricao']) ? $_POST['descricao'] : null;
    $trStatus = is_numeric($_POST['status']) ? $_POST['status'] : null;
    $idProjeto = is_numeric($_POST['projeto']) ?  $_POST['projeto'] : 0;
    $idUsuario = is_numeric($_POST['usuario']) ?  $_POST['usuario'] : 0;

    $turma = new Tarefa();

    $turma ->setDtCriacao($dtCriacao); 
    
    if($idProject) {

        $project = new Projeto();
        $project->setId($idProject);
        $tarefa->setProjeto($project);
    }

    // Chamar o controller para salvar a Tarefa 
    $tarefaCont = new TarefaController();
    $erros = $tarefaCont->salvar($tarefa);

    // Retornar os erros ou uma string vazia se não houverem erros 
    $msgErro = "";
    if($erros)
        $msgErro = implode("<br>" , $erros); 

    echo $msgErro;

    // echo $ano . " - " . $idCurso . " - " . $idDisc;

?>