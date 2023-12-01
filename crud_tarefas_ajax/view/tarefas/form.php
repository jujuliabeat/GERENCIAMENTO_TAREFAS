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

<div class="row g-5 col-md-12 m-2 p-3">
    <h3 style="color:#b84aff;" class="text-center fw-normal"><?php
    echo (!$tarefa || $tarefa->getId() <= 0 ? 'Inserir' : 'Alterar');
    ?> Tarefa</h3>

    <form action="" method="POST" id="form" class="row g-3">


        <div class="col-md-4">
            <label for="txtTitulo" style="color:black;"  >Título:</label>
            <input  style="background-color: #b84aff; " type="text" class="form-control text-light"  name="titulo" id="txtTitulo" value="<?php echo ($tarefa ? $tarefa->getTitulo() : ""); ?>" />
        </div>

        <br>

        <div class="col-md-6">
            <label for="txtDesc" style="color:black;" >Descrição:</label>
            <input style="background-color: #b84aff; " type="text" class="form-control text-light"  name="descricao" id="txtDesc" value="<?php echo ($tarefa ? $tarefa->getDescricao() : ''); ?>" />
        </div>

        <br><br><br><br>

        <div class="col-md-3">
            <label for="txtDtCriacao" style="color:black;" >Data de Criação:</label>
            <input style="background-color: #b84aff; " type="date" name="dtCriacao" class="form-control text-light"  id="txtDtCriacao" value="<?php echo ($tarefa ? $tarefa->getDtCriacao() : ''); ?>" />
        </div>

        <br>

        <div class="col-md-3">
            <label for="selStatus" style="color:black;" >Status de andamento:</label>
            <select style="background-color: #b84aff; " name="status" id="selStatus" class="form-control text-light" >
                <option value="">--Selecione--</option>
                <option value="A" <?php echo ($tarefa && $tarefa->getTrStatus() == 'A' ? 'selected' : ''); ?>>Andamento</option>
                <option value="P" <?php echo ($tarefa && $tarefa->getTrStatus() == 'P' ? 'selected' : ''); ?>>Pendente</option>
                <option value="C" <?php echo ($tarefa && $tarefa->getTrStatus() == 'C' ? 'selected' : ''); ?>>Concluído</option>
            </select>
        </div>

        <br>
        <br>

        <div class="col-md-2">
            <label for="selUsuario" style="color:black;" >Usuário:</label>
                <select style="background-color: #b84aff; " name="usuario" id="selUsuario"  class="form-control text-light">
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
        <br><br>
        
            <div class="col-md-3">
            <label for="selProjeto" style="color:black;" >Projeto Vinculado:</label>
            <select  style="background-color: #b84aff; " name="projeto" id="selProjeto" class="form-control text-light" >
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
        <br><br>


        <input type="hidden" name="id" value="<?php echo ($tarefa ? $tarefa->getId() : 0); ?>" />
        <input type="hidden" name="submetido" value="1" />

       <!-- <div class="row g-3 text-center ">
            <div class="col md-6">
                <button type="submitido">Submeter</button>
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
        </div> -->

    <!-- </form> -->
    <ul class="list-group list-group-flush text-center">
            <li class="list-group-item">
                <button class="rounded-3 p-2" style="background: #7074ff " type="submit" >Submeter</button>
                <button class="rounded-3 p-2" style="background: #7074ff " type="reset">Limpar</button>
                <button class="rounded-3 p-2" style="background: #7074ff "> <a href="<?= BASE_URL ?>/view/tarefas/listar.php" class="card-link text-decoration-none text-white">Voltar</a></button>
            </li>
    </ul>
    

    </form>

        <div style="color: red;">
                                                                
            <?php echo $msgErro; ?>

        </div>

        <br>

        
       <!-- <div class="col-md-12 mt-3" >

            <a href="listar.php" class="btn btn-link" style="text-decoration: none;">Voltar</a>

        </div>-->

    
</div>

<?php
include_once(__DIR__ . "/../include/footer.php");
?>