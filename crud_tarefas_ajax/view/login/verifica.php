<?php
//Arquivo que verifica se o usuário está logado

require_once(__DIR__ . "/../../controller/LoginController.php");

$loginCont = new LoginController();
if(! $loginCont->verificarUsuarioLogado())
    header("location: " . BASE_URL . "/view/login/login.php");