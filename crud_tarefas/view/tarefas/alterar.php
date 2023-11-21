<?php 
//View para alterar tarefas

require_once(__DIR__ . "/../../controller/TarefaController.php");
require_once(__DIR__ . "/../../model/Tarefa.php");
require_once(__DIR__ . "/../../model/Projeto.php");
require_once(__DIR__ . "/../../model/Usuario.php");

$msgErro = "";
$tarefa = null;

$tarefaCont = new TarefaController();

if(isset($_POST['submetido'])) {
    //Usuário clicou no botão gravar (submeteu o formulário)
    // echo 'clicou no gravar';
    $titulo = trim($_POST['titulo']) ? trim($_POST['titulo']) : null;
    $descricao = trim($_POST['descricao']) ? trim($_POST['descricao']) : null;
    $dtCriacao = trim($_POST['dtCriacao']) ? trim($_POST['dtCriacao']) : null;
    $trStatus = trim($_POST['status']) ? trim($_POST['status']) : null;
    $idProjeto = trim($_POST['projeto']) ? trim( $_POST['projeto'] ): null;
    $idUsuario = trim($_POST['usuario']) ? trim( $_POST['usuario'] ): null;

    $idtarefa = $_POST['id'];


    $tarefa = new tarefa();
    $tarefa->setId($idtarefa);
    $tarefa->setTitulo($titulo);
    $tarefa->setDescricao($descricao);
    $tarefa->setDtCriacao($dtCriacao);
    $tarefa->setTrStatus($trStatus);


    if($idProjeto) {
        $projeto = new Projeto();
        $projeto->setId($idProjeto);
        $tarefa->setProjeto($projeto);
    }

    if($idUsuario) {
        $usuario = new Usuario();
        $usuario->setId($idUsuario);
        $tarefa->setUsuario($usuario);
    }


    // Criar um tarefa Controller
    $tarefaCont = new TarefaController();
    $erros = $tarefaCont->atualizar($tarefa);

    if(! $erros) {
        // Redirecionar para o listar
        header("location: listar.php");
        exit;

    } else {
        $msgErro = implode("<br>",$erros);
        // print_r($erros);
    }

}else {
    //Usuário apenas entrou na página para alterar
    $idtarefa = 0;
    if(isset($_GET['idTarefa']))
        $idtarefa = $_GET['idTarefa'];

    
    $tarefa =  $tarefaCont->buscarPorId($idtarefa);
    // print_r($tarefa);
    if(! $tarefa) {
        echo "Tarefa não encontrada!<br>";
        echo "<a href='listar.php'><br>Voltar</a>";
        exit;
    }
}

//Inclui o formulário
include_once(__DIR__ . "/form.php");