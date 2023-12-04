<?php

    require_once(__DIR__. "/../controller/ProjetoController.php");

    $idUsuario = $_GET['idUsuario'];

    $projectCont = new ProjetoController();
    $projetos = $projectCont-> listar($idUsuario);

    echo json_encode($projetos, JSON_UNESCAPED_UNICODE);
?>