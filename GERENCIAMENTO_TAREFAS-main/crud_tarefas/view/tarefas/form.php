<?php
// Formulário para Tarefas

include_once(__DIR__ . "/../../controller/ProjetoController.php");
include_once(__DIR__ . "/../../controller/UsuarioController.php");
include_once(__DIR__ . "/../include/header.php");

$projetoCont = new ProjetoController();
$projetos = $projetoCont->listar();
//print_r($projetos);

$usuarioCont = new UsuarioController();
$usuarios = $usuarioCont->listarUsuarios();

?>

<h3><?php
    echo (!$tarefa || $tarefa->getId() <= 0 ? 'Inserir' : 'Alterar');
    ?> Tarefa</h3>

<div class="row g-5 col-md-12 m-2">
    <form action="" method="POST" id="form" class="row g-3">


        <div class="col-md-4">
            <label for="txtTitulo">Título:</label>
            <input type="text" class="form-control"  name="titulo" id="txtTitulo" value="<?php echo ($tarefa ? $tarefa->getTitulo() : ""); ?>" />
        </div>

        <br>

        <div class="col-md-6">
            <label for="txtDesc">Descrição:</label>
            <input type="text" class="form-control"  name="descricao" id="txtDesc" value="<?php echo ($tarefa ? $tarefa->getDescricao() : ''); ?>" />
        </div>

        <br>

        <div class="col-md-3">
            <label for="txtDtCriacao">Data de Criação:</label>
            <input type="date" name="dtCriacao" class="form-control"  id="txtDtCriacao" value="<?php echo ($tarefa ? $tarefa->getDtCriacao() : ''); ?>" />
        </div>

        <br>

        <div class="col-md-3">
            <label for="selStatus">Status de andamento:</label>
            <select name="status" id="selStatus" class="form-control" >
                <option value="">--Selecione--</option>
                <option value="A" <?php echo ($tarefa && $tarefa->getTrStatus() == 'A' ? 'selected' : ''); ?>>Andamento</option>
                <option value="P" <?php echo ($tarefa && $tarefa->getTrStatus() == 'P' ? 'selected' : ''); ?>>Pendente</option>
                <option value="C" <?php echo ($tarefa && $tarefa->getTrStatus() == 'C' ? 'selected' : ''); ?>>Concluído</option>
            </select>
        </div>

        <br>

        <div class="col-md-2">
            <label for="selProjeto">Projeto Vinculado:</label>
            <select name="projeto" id="selProjeto" class="form-control" >
                <option value="">--Selecione o Projeto--</option>
                <!--<option value="<?php //echo ($tarefa ? $tarefa->getProjeto() : ""); ?>"></option>
                <option value="<?php //echo ($tarefa ? $tarefa->getProjeto() : ""); ?>"></option>-->

                <?php foreach ($projetos as $projeto) : ?>
                    <option value="<?= $projeto->getId(); ?>" <?php
                                                                if (
                                                                    $tarefa && $tarefa->getProjeto() &&
                                                                    $tarefa->getProjeto()->getId() == $projeto->getId()
                                                                )
                                                                    echo 'selected';
                                                                ?>>
                        <?= $projeto->getNome(); ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <br>
        <br>

        <div class="col-md-2">
            <label for="selUsuario">Usuário:</label>
                <select name="usuario" id="selUsuario"  class="form-control">
                    <option value="">--Selecione o Usuário--</option>
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

        <br>
        <br>


        <input type="hidden" name="id" value="<?php echo ($tarefa ? $tarefa->getId() : 0); ?>" />
        <input type="hidden" name="submetido" value="1" />

        <div class="row g-3 text-center ">
            <div class="col md-6">
                <button type="submit">Submeter</button>
            </div>
            <div class="col md-6">
                <button type="reset">Limpar</button>
            </div>

            <div style="color: red;" class="valid-feedback">
                                                            
            <?php echo $msgErro; ?>

        </div>

            <br>

                <a href="listar.php">Voltar</a>

            </div>
        </div>

    </form>

    
</div>

<?php
include_once(__DIR__ . "/../include/footer.php");
?>