<?php

    require_once(__DIR__. "/../controller/ProjetoController.php");

    // Em listar_por_usuario.php
    $idUsuario = isset($_GET['idUsuario']) ? (int)$_GET['idUsuario'] : 0;

    $projetoController = new ProjetoController();
    $projetos = $projetoController->listar($idUsuario);


    echo json_encode($projetos, JSON_UNESCAPED_UNICODE);
?>