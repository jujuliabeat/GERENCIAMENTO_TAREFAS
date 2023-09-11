<?php
    // Página view para listagem de alunos
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require_once(__DIR__."/../../controller/AlunoController.php");
    // require_once()

    $alunoCont = new AlunoController();
    $alunos = $alunoCont->listar();
    // print_r($alunos);
?>

    <?php
        require(__DIR__."/../include/header.php");
    ?>

    <h4 style="color:blueviolet;">Listagem de Alunos</h4>

    <div>
        <a class="btn btn-sucess" href="inserir.php">Inserir</a>
    </div>

    <table class="table table-striped">

            <thead >
                <tr>
                    <td>Nome</td>
                    <td>Idade</td>
                    <td>Estrangeiro</td>
                    <td>Curso</td>
                    <td>Alterar</td>
                    <td>Excluir</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($alunos as $a):?>
                        <tr>
                            <td><?php echo $a->getNome();?></td>
                            <td><?php echo $a->getIdade();?></td>
                            <td><?php echo $a->getEstrangeiroTexto();?></td>
                            <td><?php echo $a->getcurso();?></td>

                            <td><a href="alterar.php?idAluno=<?=$a->getId()?>">
                                    <img src="../../img/btn_editar.png">
                                </a>
                            </td>
                            <td>
                                <a href="excluir.php?idAluno=<?=$a->getId()?>"
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


    
