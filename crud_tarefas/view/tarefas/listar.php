<?php
    // Página view para listagem de Tarefas
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require_once(__DIR__."/../../controller/TarefaController.php");
    // require_once()

    $tarefaCont = new TarefaController();
    $tarefas = $tarefaCont->listar();
    //print_r($tarefas);
?>

<?php
        require(__DIR__."/../include/header.php");
    ?>

    <h4 style="color:blueviolet;">Listagem de Tarefas</h4>

    <div>
        <a class="btn btn-sucess" href="inserir.php">Inserir</a>
    </div>

    <table class="table table-striped">

            <thead >
                <tr>
                    <td>Título</td>
                    <td>Descricação</td>
                    <td>Data de criação</td>
                    <td>Status da atividade</td>
                    <td>Projeto vinculado</td>
                    <td>Usuario vinculado</td>
                    <td>Alterar</td>
                    <td>Excluir</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($tarefas as $t):?>
                        <tr>
                            <td><?php echo $t->getTitulo();?></td>
                            <td><?php echo $t->getDescricao();?></td>
                            <td><?php echo $t->getDtCriacao();?></td>
                            <td><?php echo $t->getTrStatus();?></td>
                            <td><?php echo $t->getProjeto();?></td>
                            <td><?php echo $t->getUsuario();?></td>

                            <td><a href="alterar.php?idTarefa=<?=$t->getId()?>">
                                    <img src="../../img/btn_editar.png">
                                </a>
                            </td>
                            <td>
                                <a href="excluir.php?idTarefa=<?=$t->getId()?>"
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


    

