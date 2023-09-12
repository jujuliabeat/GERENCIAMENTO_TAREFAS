<?php
    // Formulário para Tarefas

    include_once(__DIR__."/../../controller/CursoController.php");
    include_once(__DIR__."/../include/header.php");

    $cursoCont = new CursoController();
    $cursos = $cursoCont->listar();
    // print_r($cursos);
?>

    <h3><?php
        echo (!$aluno || $aluno->getId() <= 0 ? 'Inserir' : 'Alterar')
    ?> Alunos</h3>

    <form action="" method="POST" id="form">
        

        <div>
            <label for="txtNome">Nome:</label>
            <input type="text" name="nome" id="txtNome"
             value="<?php echo ($aluno ? $aluno->getNome() : "");?>"/>
        </div> 

        <br>

        <div>
            <label for="txtIdade">Idade:</label>
            <input type="number" name="idade" id="txtIdade"
                value="<?php echo ($aluno ? $aluno->getIdade() : '');?>"/>
        </div>

        <br>

        <div>
            <label for="selEstrange">Estrangeiro:</label>
            <select name="estrang" id="selEstrange">
                <option value="">--Selecione--</option>
                <option value="S" <?php echo ($aluno && $aluno->getEstrangeiro() == 'S' ? 'selected' : '');?>>Sim</option>
                <option value="N" <?php echo ($aluno && $aluno->getEstrangeiro() == 'N' ? 'selected' : '');?>>Não</option>
            </select>
        </div>

        <br>
        
        <div>
            <label for="selCurso">Curso:</label>
            <select name="curso" id="selCurso">
                <option value="">--Selecione o Curso--</option>
                
                <?php foreach($cursos as $curso): ?>
                    <option value="<?= $curso->getId(); ?>"
                        <?php
                            if($aluno && $aluno->getCurso() &&
                                $aluno->getCurso()->getId() == $curso->getId())
                                echo 'selected';
                        ?>
                    >
                            <?= $curso->getNome(); ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <br>

        <input type="hidden" name="id" value="<?php echo ($aluno ? $aluno->getId() : 0);?>"/>
        <input type="hidden" name="submetido" value="1"/>
        
        <button type="submit">Gravar</button>
        <button type="reset">Limpar</button>
        
    </form>

    <div style="color: red;">
        <?php echo $msgErro;?>

    </div>

    <br>
    <a href="listar.php">Voltar</a>

<?php
    include_once(__DIR__."/../include/footer.php");
?>