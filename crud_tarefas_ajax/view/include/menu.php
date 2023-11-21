<?php
require_once(__DIR__ . "/../../util/config.php");

require_once(__DIR__ . "/../../controller/LoginController.php");

$usuCont = new LoginController();
$nomeUsuario = $usuCont->getNomeUsuarioLogado();
if(! $nomeUsuario)
    $nomeUsuario = '(Anônimo)';
?>
<nav class="navbar navbar-expand-md navbar-light bg-success">
    <a class="navbar-brand" href="#">CRUD MVC</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" 
            data-target="#navSite">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navSite">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>/index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navDropDown" data-toggle="dropdown">Cadastros</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= BASE_URL ?>/view/alunos/listar.php">Alunos</a>
                    <a class="dropdown-item" href="<?= BASE_URL ?>/view/turmas/listar.php">Turmas</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navDropDown" data-toggle="dropdown"><?= $nomeUsuario ?></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= BASE_URL ?>/view/login/sair.php">Sair</a>
                </div>
            </li>
        </ul>
    </div>
</nav>