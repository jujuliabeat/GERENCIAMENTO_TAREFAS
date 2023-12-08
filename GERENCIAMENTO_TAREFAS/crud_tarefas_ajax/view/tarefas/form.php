
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

<div class="row g-4 col-md-12 m-2 p-3">
    <h3 style="color:#1f7f15;" class="text-center fw-normal"><?php
    echo (!$tarefa || $tarefa->getId() <= 0 ? 'Inserir' : 'Alterar');
    ?> Tarefa</h3>

    <form action="" method="POST" id="form" class="row g-3" name="frmCadastroTarefa">


        <div class="col-md-4 m-2">
            <label for="txtTitulo" style="color:#529f43;"  >Título:</label>
            <input  style="background-color:#ebffd0; color:#0d2b09;" placeholder="Insira um texto aqui" type="text" class="form-control"  name="titulo" id="txtTitulo" value="<?php echo ($tarefa ? $tarefa->getTitulo() : ""); ?>" />
        </div>

        <br>

        <div class="col-md-6 m-2">
            <label for="txtDesc" style="color:#529f43;" >Descrição:</label>
            <input style="background-color:#ebffd0; color:#0d2b09;" placeholder="Diga-me o que pretendes.." type="text" class="form-control"  name="descricao" id="txtDesc" value="<?php echo ($tarefa ? $tarefa->getDescricao() : ''); ?>" />
        </div>

        <br><br><br><br>

        <div class="col-md-3">
            <label for="txtDtCriacao" style="color:#529f43;" >Data de Criação:</label>
            <input style="background-color:#ebffd0; color:#0d2b09;" type="date" name="dtCriacao" class="form-control"  id="txtDtCriacao" value="<?php echo ($tarefa ? $tarefa->getDtCriacao() : ''); ?>" />
        </div>

        <br>

        <div class="col-md-3">
            <label for="selStatus" style="color:#529f43;" >Status de andamento:</label>
            <select style="background-color:#ebffd0; color:#0d2b09;" name="status" id="selStatus" class="form-control" >
                <option value="">--Selecione--</option>
                <option value="A" <?php echo ($tarefa && $tarefa->getTrStatus() == 'A' ? 'selected' : ''); ?>>Andamento</option>
                <option value="P" <?php echo ($tarefa && $tarefa->getTrStatus() == 'P' ? 'selected' : ''); ?>>Pendente</option>
                <option value="C" <?php echo ($tarefa && $tarefa->getTrStatus() == 'C' ? 'selected' : ''); ?>>Concluído</option>
            </select>
        </div>

        <br>
        <br>

        <div class="col-md-2">
            <label for="selUsuario" style="color:#529f43;" >Usuário:</label>
                <select style="background-color:#ebffd0; color:#0d2b09" name="usuario" id="selUsuario"  class="form-control"  onchange="buscarProjeto();">
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

        <br>
        <br><br>
        
            <div class="col-md-3 mt-3">
                <label for="selProjeto" style="color: #529f43;">Projeto Vinculado:</label>
                <select style="background-color: #ebffd0; color:#0d2b09" id="selProjeto" name="projeto" class="form-control" 
                    idSelecionado="<?php echo ($tarefa && $tarefa->getProjeto() ? $tarefa->getProjeto()->getId() : '0'); ?>">
                    
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
    <ul class="list-group list-group-flush text-center mt-5">
            <li class="list-group-item">
                <button class="rounded-3 p-2" style="background: #7074ff " type="submit" onclick="inserirTarefa();">Submeter</button>
                <button class="rounded-3 p-2" style="background: #7074ff " type="reset">Limpar</button>
                <button class="rounded-3 p-2" style="background: #7074ff "> <a href="<?= BASE_URL ?>/view/tarefas/listar.php" class="card-link text-decoration-none text-white">Voltar</a></button>
            </li>
    </ul>
    

    </form>

        <div style="color: red;">
                                                                
            <?php echo $msgErro; ?>

        </div>

        <br>
    
</div>

<script src="js/tarefas.js"></script>

<?php
include_once(__DIR__ . "/../include/footer.php");
?>
