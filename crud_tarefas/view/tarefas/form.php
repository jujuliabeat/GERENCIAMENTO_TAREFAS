<?php
// Formulário para Tarefas

include_once(__DIR__ . "/../../controller/ProjetoController.php");
include_once(__DIR__ . "/../include/header.php");

$projetoCont = new ProjetoController();
$projetos = $projetoCont->listar();
//print_r($projetos);

?>

<h3><?php
    echo (!$tarefa || $tarefa->getId() <= 0 ? 'Inserir' : 'Alterar')
    ?> Tarefa</h3>

<form action="" method="POST" id="form">


    <div>
        <label for="txtTitulo">Título:</label>
        <input type="text" name="titulo" id="txtTitulo" value="<?php echo ($tarefa ? $tarefa->getTitulo() : ""); ?>" />
    </div>

    <br>

    <div>
        <label for="txtDesc">Descrição:</label>
        <input type="text" name="descricao" id="txtDesc" value="<?php echo ($tarefa ? $tarefa->getDescricao() : ''); ?>" />
    </div>

    <br>

    <div>
        <label for="txtDtCriacao">Data de Criação:</label>
        <input type="date" name="dtCriacao" id="txtDtCriacao" value="<?php echo ($tarefa ? $tarefa->getDtCriacao() : ''); ?>" />
    </div>

    <br>

    <div>
        <label for="selStatus">Status de andamento:</label>
        <select name="status" id="selStatus">
            <option value="">--Selecione--</option>
            <option value="A" <?php echo ($tarefa && $tarefa->getTrStatus() == 'A' ? 'selected' : ''); ?>>Andamento</option>
            <option value="P" <?php echo ($tarefa && $tarefa->getTrStatus() == 'P' ? 'selected' : ''); ?>>Pendente</option>
            <option value="C" <?php echo ($tarefa && $tarefa->getTrStatus() == 'C' ? 'selected' : ''); ?>>Concluído</option>
        </select>
    </div>

    <br>

    <label for="selProjeto">Projeto Vinculado:</label>
    <select name="projeto" id="selProjeto">
        <option value="">--Selecione o Projeto--</option>

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

    <br>
    <br>

    <div>
        <label for="txtUsuario">Informe o nome do Usuário:</label>
        <input type="number" name="usuario" id="txtUsuario" value="<?php echo ($tarefa ? $tarefa->getUsuario() : ""); ?>" />
    </div>

    <br>
    <br>


    <input type="hidden" name="id" value="<?php echo ($tarefa ? $tarefa->getId() : 0); ?>" />
    <input type="hidden" name="submetido" value="1" />

    <button type="submit">Submeter</button>
    <button type="reset">Limpar</button>

</form>

    <div style="color: red;">
                                                            
        <?php echo $msgErro; ?>

    </div>

    <br>

        <a href="listar.php">Voltar</a>

    </div>

<?php
include_once(__DIR__ . "/../include/footer.php");
?>