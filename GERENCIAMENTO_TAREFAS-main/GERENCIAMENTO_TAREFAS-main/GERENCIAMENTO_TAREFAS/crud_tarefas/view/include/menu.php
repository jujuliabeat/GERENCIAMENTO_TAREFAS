<?php
require_once(__DIR__ . "/../../util/config.php");
?>

<nav class=" p-10 mb-3">
    <ul class="nav nav-pills" >
        <li class="nav-item">
            <a class="nav-link text-dark text-decoration-none my-link" href="<?= BASE_URL ?>/index.php">Home</a>
        </li>
        <li class="nav-item dropdown"> 
            <a class="nav-link dropdown-toggle text-dark text-decoration-none my-link" data-toggle="dropdown" href="#" 
            role="button" aria-haspopup="true" aria-expanded="false">Áreas</a>
            <div class="dropdown-menu">
            <a class="dropdown-item text-dark text-decoration-none my-link" href="<?= BASE_URL ?>/view/tarefas/inserir.php">Inserir Tarefas</a>
            <a class="dropdown-item text-dark text-decoration-none my-link" href="<?= BASE_URL ?>/view/usuarios/inserir.php">Inserir Usuários</a>
            <a class="dropdown-item text-dark text-decoration-none my-link" href="<?= BASE_URL ?>/view/tarefas/listar.php">Registros de Tarefas</a>
            <a class="dropdown-item text-dark text-decoration-none my-link" href="<?= BASE_URL ?>/view/usuarios/listar.php">Registros de Usuários</a>
        </li>
        
    </ul>
</nav>
