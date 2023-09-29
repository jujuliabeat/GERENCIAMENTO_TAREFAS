<?php
// Formulário para Tarefas

include_once(__DIR__ . "/../../controller/ProjetoController.php");
include_once(__DIR__ . "/../include/header.php");

$projetoCont = new ProjetoController();
$projetos = $projetoCont->listar();
//print_r($projetos);

?>

<h3>
    <?php
    echo (!$usuario || $usuario->getId() <= 0 ? 'Inserir' : 'Alterar');
    ?> Usuarios</h3>

<div class="row g-5 col-md-12 m-2 p-3">
    <form action="" method="POST" id="form" class="row g-3">


        <div class="col-md-4">
            <label for="txtNome" style="color: black;">Nome:</label>
            <input style="background-color: MediumOrchid;" type="text" class="form-control" name="nome" id="txtNome" value="<?php echo ($usuario ? $usuario->getNome() : ""); ?>" />
        </div>

        <br>

        <div class="col-md-6">
            <label for="txtEmail" style="color: black;">E-mail:</label>
            <input style="background-color: MediumOrchid;" type="email" class="form-control" name="email" id="txtEmail" value="<?php echo ($usuario ? $usuario->getEmail() : ''); ?>" />
        </div>

        <br><br><br><br>

        <div class="col-md-4">
            <label for="txtSenha" style="color: black;">Crie uma senha:</label>
            <input style="background-color: MediumOrchid;" type="password" name="senhar" class="form-control" id="txtSenha" value="<?php echo ($usuario ? $usuario->getSenhar() : ''); ?>" />
        </div>

        <br><br><br>

        <div class="col-md-4"> 
            <label  for="confirma_senha" style="color: black;">Confirme a senha:</label>
            <input style="background-color: MediumOrchid;" type="password" id="confirma_senha" class="form-control" name="confirma_senha">
        </div>

        <br>
        <br><br><br>


        <input type="hidden" name="id" value="<?php echo ($usuario ? $usuario->getId() : 0); ?>" />
        <input type="hidden" name="submetido" value="1" />

        <button type="submit">Submeter</button>
        <button type="reset">Limpar</button>

    </form>

    <div style="color: red;">

        <?php echo $msgErro; ?>

    </div>

    <br>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <button><a href="<?= BASE_URL ?>/view/usuarios/listar.php" class="card-link text-decoration-none text-white">Voltar</a></button>
        </li>
    </ul>

    <!--  <a href="listar.php">Voltar</a>

        </div>-->


</div>

<?php
include_once(__DIR__ . "/../include/footer.php");
?>