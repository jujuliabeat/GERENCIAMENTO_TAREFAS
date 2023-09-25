<?php
// Página view para listagem de Tarefas
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(__DIR__ . "/../../controller/TarefaController.php");
// require_once()

$tarefaCont = new TarefaController();
$tarefas = $tarefaCont->listar();
//print_r($tarefas);
?>

<div class="geral justify-content-center">
    <?php

    require(__DIR__ . "/../include/header.php");
    ?>

    <h4 style="color:blueviolet;">Listagem de Geral</h4>

    <div>
        <a class="btn btn-sucess" href="inserir.php">Inserir</a>
    </div>

    <table class="table table-borderless text-align-center">

        <thead>
            <tr class="table-active">
                <td>Título</td>
                <td>Descricação</td>
                <td>Data de criação</td>
                <td>Status da atividade</td>
                <td>Projeto vinculado</td>
                <td>Usuario vinculado</td>
                <td>Alterar</td>
                <td>Excluir</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($tarefas as $t) : ?>
                <tr>
                    <td><?php echo $t->getTitulo(); ?></td>
                    <td><?php echo $t->getDescricao(); ?></td>
                    <td><?php echo $t->getDtCriacao(); ?></td>
                    <td><?php echo $t->getTrStatus(); ?></td>
                    <td><?php echo $t->getProjeto()->getId(); ?></td>
                    <td><?php echo $t->getUsuario()->getId(); ?></td>

                    <td><a href="alterar.php?idTarefa=<?= $t->getId() ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brush" viewBox="0 0 16 16">
                                <path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.118 8.118 0 0 1-3.078.132 3.659 3.659 0 0 1-.562-.135 1.382 1.382 0 0 1-.466-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.394-.197.625-.453.867-.826.095-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.201-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.176-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04zM4.705 11.912a1.23 1.23 0 0 0-.419-.1c-.246-.013-.573.05-.879.479-.197.275-.355.532-.5.777l-.105.177c-.106.181-.213.362-.32.528a3.39 3.39 0 0 1-.76.861c.69.112 1.736.111 2.657-.12.559-.139.843-.569.993-1.06a3.122 3.122 0 0 0 .126-.75l-.793-.792zm1.44.026c.12-.04.277-.1.458-.183a5.068 5.068 0 0 0 1.535-1.1c1.9-1.996 4.412-5.57 6.052-8.631-2.59 1.927-5.566 4.66-7.302 6.792-.442.543-.795 1.243-1.042 1.826-.121.288-.214.54-.275.72v.001l.575.575zm-4.973 3.04.007-.005a.031.031 0 0 1-.007.004zm3.582-3.043.002.001h-.002z" />
                            </svg>
                        </a>
                    </td>
                    <td>
                        <a href="excluir.php?idTarefa=<?= $t->getId() ?>" onclick=" return confirm('Confirma a exclusão?');">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                            </svg>
                        </a>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

    <?php
    require(__DIR__ . "/../include/footer.php");
    ?>
</div>