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

    <form action="" method="POST" id="form">


        <div>
            <label for="txtNome">Nome:</label>
            <input type="text" name="nome" id="txtNome" value="<?php echo ($usuario ? $usuario->getNome() : ""); ?>" />
        </div>

        <br>

        <div>
            <label for="txtEmail">E-mail:</label>
            <input type="email" name="email" id="txtEmail" value="<?php echo ($usuario ? $usuario->getEmail() : ''); ?>" />
        </div>

        <br>

        <div>
            <label for="txtSenha">Elabore uma senha:</label>
            <input type="password" name="senhar" id="txtSenha" value="<?php echo ($usuario ? $usuario->getSenhar() : ''); ?>" />
        </div>

        <br>

        <!-- <div>
            <label for="txtConfSenha">Confirme senha:</label>
            <input type="password" name="confirmar_senha" id="txtConfSenha" value="<?php echo ($usuario ? $usuario->getSenhar() : ''); ?>" />
        </div> -->

        <br>


        <input type="hidden" name="id" value="<?php echo ($usuario ? $usuario->getId() : 0); ?>" />
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

    
</div>

<?php
include_once(__DIR__ . "/../include/footer.php");
?>