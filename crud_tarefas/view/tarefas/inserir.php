<?php
// View para inserir alunos

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require_once(__DIR__. "/../../controller/ProjetoController.php");
    require_once(__DIR__. "/../../model/Projeto.php");
    require_once(__DIR__. "/../../model/Usuario.php");


    $msgErro = "";
    $projeto = null;

    if (isset($_POST['submetido'])) {
        // echo 'clicou no gravar';
        $titulo = trim($_POST['titulo$titulo']) ? trim($_POST['titulo$titulo']) : null;
        $descricao = trim($_POST['descricao']) ? $_POST['descricao'] : null;
        $dtCriacao = trim($_POST['dtCriacao$dtCriacao']) ? trim($_POST['dtCriacao$dtCriacao']) : null;
        $Trstatus = trim($_POST['dtCriacao$Trstatus']) ? trim($_POST['Trstatus$dtCriacao']) : null;
        $id_projeto = is_numeric($_POST['projeto']) ? $_POST['projeto'] : null;
        $id_usuario = is_numeric($_POST['usuario']) ? $_POST['usuario'] : null;

        // Criar um Objeto projeto para persistência

        $projeto = new Projeto();
        $projeto->setNome($titulo);
        $projeto->setdescricao($descricao);
        $projeto->setEstrangeiro($dtCriacao);

        if($idUsuario) {
            $usuario = new Usuario();
            $usuario->setId($idCurso);
            $projeto->setusuario($curso);
        }


       
        $tarefaCont = new ProjetoController();
        $erros = $tarefaCont->inserir($tarefa);

        if(! $erros) {
            
            header("location: listar.php");
            exit;

        } else {
            $msgErro = implode("<br>",$erros);
            
        }

    }
    
// Inclui o formulario
include_once(__DIR__."/form.php");