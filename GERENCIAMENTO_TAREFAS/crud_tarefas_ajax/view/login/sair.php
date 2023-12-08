<?php

//Página que verifica se o usuário está logado
require_once(__DIR__ . "/../../controller/LoginController.php");

$loginCont = new LoginController();
$loginCont->deslogar();
header("location: login.php");