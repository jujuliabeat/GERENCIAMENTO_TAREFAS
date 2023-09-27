<?php

    // View para excluir um User

    require_once (__DIR__."/../../controller/UsuarioController.php");


    $idUsuario = 0;
    if(isset($_GET['idUsuario']))
        $idUsuario = $_GET['idUsuario'];

    $usuarioCont = new UsuarioController();
    $usuario = $usuarioCont->buscarPorId($idUsuario);

    if(! $usuario) {
        echo 'Usuario não encontrada!<br>';
        echo '<a href= "listar.php"> Voltar </a>';
        exit;
    }

    $usuarioCont->excluirPorid($usuario->getId());

    // Voltar a listar.php automaticamente
    header("location: listar.php");