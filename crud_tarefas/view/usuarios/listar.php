<?php
    // Página view para listagem de Tarefas
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require_once(__DIR__."/../../controller/UsuarioController.php");
    // require_once()

    $usuarioCont = new UsuarioController();
    $usuarios = $usuarioCont->listarUsuarios();
    //print_r($usuarios);
?>

<?php
        require(__DIR__."/../include/header.php");
    ?>

    <h4 style="color:blueviolet;">Usuários registrados</h4>

    <div>
        <a class="btn btn-sucess" href="inserir.php">Inserir</a>
    </div>

    <table class="table table-striped">

            <thead >
                <tr>
                    <td>Nome</td>
                    <td>E-mail</td>
                    <td>Alterar</td>
                    <td>Excluir</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($usuarios as $t):?>
                        <tr>
                            <td><?php echo $t->getNome();?></td>
                            <td><?php echo $t->getEmail();?></td>

                            <td><a href="alterar.php?idUsuario=<?=$t->getId()?>">
                                    <img src="../../img/btn_editar.png">
                                </a>
                            </td>
                            <td>
                                <a href="excluir.php?idUsuario=<?=$t->getId()?>"
                                 onclick=" return confirm('Confirma a exclusão?');">
                                    <img src="../../img/btn_excluir.png">
                                </a>
                            </td>
                            
                        </tr>
                <?php endforeach;?>
            </tbody>

    </table>

    <?php
        require(__DIR__."/../include/footer.php");
    ?>


    

