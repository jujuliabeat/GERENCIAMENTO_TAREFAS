<?php
// Formulário para Tarefas

include_once(__DIR__ . "/../../controller/ProjetoController.php");
include_once(__DIR__ . "/../include/header.php");

$projetoCont = new ProjetoController();
$projetos = $projetoCont->listar();
//print_r($projetos);

?>

<div class="row g-5 col-md-12 m-2 p-3">
    <h3 style="color:#b84aff;" class="text-center fw-normal">
    <?php
    echo (!$usuario || $usuario->getId() <= 0 ? 'Inserir' : 'Alterar');
    ?> Usuários</h3>

    <form action="" method="POST" id="form" class="row g-3">


        <div class="col-md-4">
            <label for="txtNome" style="color: black;">Nome:</label>
            <input style="background-color: #b84aff;" type="text" class="form-control text-light" name="nome" id="txtNome" value="<?php echo ($usuario ? $usuario->getNome() : ""); ?>" />
        </div>

        <br>

        <div class="col-md-6">
            <label for="txtEmail" style="color: black;">E-mail:</label>
            <input style="background-color: #b84aff;" type="email" class="form-control text-light" name="email" id="txtEmail" value="<?php echo ($usuario ? $usuario->getEmail() : ''); ?>" />
        </div>

        <br><br><br><br>

        <div class="col-md-4">
            <label for="txtSenha" style="color: black;">Crie uma senha:</label>
            <input style="background-color: #b84aff;" type="password" name="senhar" class="form-control text-light" id="txtSenha" value="<?php echo ($usuario ? $usuario->getSenhar() : ''); ?>" />
        </div>

        <br><br><br>

        <div class="col-md-4"> 
            <label  for="confirma_senha" style="color: black;">Confirme a senha:</label>
            <input style="background-color: #b84aff;" type="password" id="confirma_senha" class="form-control text-light" name="confirma_senha">
        </div>

        <br>
        <br>


        <input type="hidden" name="id" value="<?php echo ($usuario ? $usuario->getId() : 0); ?>" />
        <input type="hidden" name="submetido" value="1" />

        <ul class="list-group list-group-flush text-center mt-5 mb-0">
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


    <!--  <a href="listar.php">Voltar</a>

        </div>-->


</div>

<?php
include_once(__DIR__ . "/../include/footer.php");
?>