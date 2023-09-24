<?php
// View para inserir Tarefas

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require_once(__DIR__. "/../../controller/TarefaController.php");
    require_once(__DIR__. "/../../model/Tarefa.php");
    require_once(__DIR__. "/../../model/Projeto.php");
    require_once(__DIR__. "/../../model/Usuario.php");


    $msgErro = "";
    $tarefa = null;

    if (isset($_POST['submetido'])) {
        // echo 'clicou no gravar';
        $titulo = trim($_POST['titulo']) ? trim($_POST['titulo']) : null;
        $descricao = trim($_POST['descricao']) ? trim($_POST['descricao']) : null;
        $dtCriacao = trim($_POST['dtCriacao']) ? trim($_POST['dtCriacao']) : null;
        $trStatus = trim($_POST['status']) ? trim($_POST['status']) : null;
        $idProjeto = trim($_POST['projeto']) ? trim( $_POST['projeto'] ): null;
        $idUsuario = trim($_POST['usuario']) ? trim( $_POST['usuario'] ): null;

        // Criar um Objeto Tarefa para persistência

        $tarefa = new Tarefa();
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


        // Criar um Tarefa Controller
        $tarefaCont = new TarefaController();
        $erros = $tarefaCont->inserir($tarefa);

        if(! $erros) {
            // Redirecionar para o listar
            header("location: listar.php");
            exit;

        } else {
            $msgErro = implode("<br>",$erros);
            // print_r($erros);
        }

    }
    
// Inclui o formulario
include_once(__DIR__."/form.php");