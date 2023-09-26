<?php
require_once(__DIR__ . "/../../util/config.php");
?>

<nav class=" p-10 mb-5">
    <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" href="<?= BASE_URL ?>/index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Sobre</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" 
            role="button" aria-haspopup="true" aria-expanded="false">Áreas</a>
            <div class="dropdown-menu">
            <a class="dropdown-item" href="<?= BASE_URL ?>/view/tarefas/inserir.php">Inserir Tarefas</a>
            <a class="dropdown-item" href="<?= BASE_URL ?>/view/usuarios/inserir.php">Inserir Usuários</a>
            <a class="dropdown-item" href="<?= BASE_URL ?>/view/tarefas/listar.php">Registros de Tarefas</a>
            <a class="dropdown-item" href="<?= BASE_URL ?>/view/usuarios/listar.php">Registros de Usuários</a>
        </li>
        
    </ul>
</nav>
