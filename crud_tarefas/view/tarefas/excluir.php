<?php

    // View para excluir uma Tarefa

    require_once (__DIR__."/../../controller/TarefaController.php");


    $idTarefa = 0;
    if(isset($_GET['idTarefa']))
        $idTarefa = $_GET['idTarefa'];

    $tarefaCont = new TarefaController();
    $tarefa = $tarefaCont->buscarPorId($idTarefa);

    if(! $tarefa) {
        echo 'Tarefa não encontrada!<br>';
        echo '<a href= "listar.php"> Voltar </a>';
        exit;
    }

    $tarefaCont->excluirPorid($tarefa->getId());

    // Voltar a listar.php automaticamente
    header("location: listar.php");