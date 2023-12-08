
<?php

// Formulário para Tarefas

include_once(__DIR__ . "/../../controller/ProjetoController.php");
include_once(__DIR__ . "/../../controller/UsuarioController.php");
include_once(__DIR__ . "/../include/header.php");

// form.php

$idUsuarioLogado = 1;

$projetoController = new ProjetoController();
$projetoController->listar($idUsuarioLogado); 

//print_r($projetos);
// No form.php


$usuarioCont = new UsuarioController();
$usuarios = $usuarioCont->listarUsuarios();

?>

<!-- #257e1a
#469d37
#66bc55
#86db72
#a6fa8f -->

<div class="container m-2 mt-5">
    <h3 class="text-center fw-normal" style="color: #1f7f15;"><?php
        echo (!$tarefa || $tarefa->getId() <= 0 ? 'Inserir' : 'Alterar');
        ?> Tarefa
    </h3>

    <form action="" method="POST" id="form" class="row g-3 m-4" name="frmCadastroTarefa">

        <div class="col-md-4">
            <label for="txtTitulo" class="form-label" style="color: #529f43;">Título:</label>
            <input placeholder="Insira um texto aqui" type="text" class="form-control" name="titulo" id="txtTitulo" style="background-color: #ebffd0; color: #0d2b09;" value="<?php echo ($tarefa ? $tarefa->getTitulo() : ""); ?>" />
        </div>

        <div class="col-md-6">
            <label for="txtDesc" class="form-label" style="color: #529f43;">Descrição:</label>
            <input placeholder="Diga-me o que pretendes.." type="text" class="form-control" name="descricao" id="txtDesc" style="background-color: #ebffd0; color: #0d2b09;" value="<?php echo ($tarefa ? $tarefa->getDescricao() : ''); ?>" />
        </div>

        <div class="col-md-3">
            <label for="txtDtCriacao" class="form-label" style="color: #529f43;">Data de Criação:</label>
            <input type="date" name="dtCriacao" class="form-control" id="txtDtCriacao" style="background-color: #ebffd0; color: #0d2b09;" value="<?php echo ($tarefa ? $tarefa->getDtCriacao() : ''); ?>" />
        </div>

        <div class="col-md-3">
            <label for="selStatus" class="form-label" style="color: #529f43;">Status de andamento:</label>
            <select name="status" id="selStatus" class="form-select" style="background-color: #ebffd0; color: #0d2b09;">
                <option value="">--Selecione--</option>
                <option value="A" <?php echo ($tarefa && $tarefa->getTrStatus() == 'A' ? 'selected' : ''); ?>>Andamento</option>
                <option value="P" <?php echo ($tarefa && $tarefa->getTrStatus() == 'P' ? 'selected' : ''); ?>>Pendente</option>
                <option value="C" <?php echo ($tarefa && $tarefa->getTrStatus() == 'C' ? 'selected' : ''); ?>>Concluído</option>
            </select>
        </div>

        <div class="col-md-2">
            <label for="selUsuario" class="form-label" style="color: #529f43;">Usuário:</label>
            <select name="usuario" id="selUsuario" class="form-select" onchange="buscarProjeto();" style="background-color: #ebffd0; color: #0d2b09;">
                <option value="0">--Selecione--</option>
                <?php foreach ($usuarios as $usuario) : ?>
                    <option value="<?= $usuario->getId(); ?>" <?php
                                                                if (
                                                                    $tarefa && $tarefa->getUsuario() &&
                                                                    $tarefa->getUsuario()->getId() == $usuario->getId()
                                                                )
                                                                    echo 'selected';
                                                                ?>>
                        <?= $usuario->getNome(); ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="col-md-3">
            <label for="selProjeto" class="form-label" style="color: #529f43;">Projeto Vinculado:</label>
            <select id="selProjeto" name="projeto" class="form-select" idSelecionado="<?php echo ($tarefa && $tarefa->getProjeto() ? $tarefa->getProjeto()->getId() : '0'); ?>" style="background-color: #ebffd0; color: #0d2b09;"></select>
        </div>

        <input type="hidden" name="id" value="<?php echo ($tarefa ? $tarefa->getId() : 0); ?>" />
        <input type="hidden" name="submetido" value="1" />

        
        <div style="color: red;" class="text-left mt-5 ">
                                                                
            <?php echo $msgErro; ?>

        </div>


        <br>

        <ul class="list-group list-group-flush text-center mt-5">
            <li class="list-group-item">
                <button class="rounded-3 p-2" style="background: #7074ff " type="submit" onclick="inserirTarefa();">Submeter</button>
                <button class="rounded-3 p-2" style="background: #7074ff " type="reset">Limpar</button>
                <button class="rounded-3 p-2" style="background: #7074ff "> <a href="<?= BASE_URL ?>/view/tarefas/listar.php" class="card-link text-decoration-none text-white">Voltar</button>

        </form>

        <br>


<script src="js/tarefas.js"></script>

<?php
include_once(__DIR__ . "/../include/footer.php");
?>
