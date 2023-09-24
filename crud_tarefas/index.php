<?php
//Teste de conexão
// require_once(__DIR__ . "/util/Connection.php");
// $connection = Connection::getConnection();
// print_r($connection);

include_once(__DIR__ . "/view/include/header.php");
?>

<div class="mt-5 d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="col-sm-4">
            <div class="card text-center">
                <img class="card-image-top mx-auto" src="img/card_alunos.png" style="max-width: 200px; height: auto;" />
                <div class="card-body">
                    <h5 class="card-title">Tarefas</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="<?= BASE_URL ?>/view/tarefas/listar.php" class="card-link">
                            Consultar Lista de Tarefas</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card text-center">
                <img class="card-image-top mx-auto" src="img/card_alunos.png" style="max-width: 200px; height: auto;" />
                <div class="card-body">
                    <h5 class="card-title">Usuários</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="<?= BASE_URL ?>/view/tarefas/listar.php" class="card-link">
                            Consultar Lista de Tarefas</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card text-center">
                <img class="card-image-top mx-auto" src="img/card_alunos.png" style="max-width: 200px; height: auto;" />
                <div class="card-body">
                    <h5 class="card-title">Sobre o Trabalho</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="<?= BASE_URL ?>/view/tarefas/listar.php" class="card-link">
                            Consultar Lista de Tarefas</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
include_once(__DIR__ . "/view/include/footer.php");
?>