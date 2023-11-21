<?php
// View para inserir Usuarios

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require_once(__DIR__. "/../../controller/UsuarioController.php");
    require_once(__DIR__. "/../../model/Tarefa.php");
    require_once(__DIR__. "/../../model/Projeto.php");
    require_once(__DIR__. "/../../model/Usuario.php");


    $msgErro = "";
    $usuario = null;

    if (isset($_POST['submetido'])) {
        // echo 'clicou no gravar';
        $nome = trim($_POST['nome']) ? trim($_POST['nome']) : null;
        $email = trim($_POST['email']) ? trim($_POST['email']) : null;
        $senhar = trim($_POST['senhar']) ? trim($_POST['senhar']) : null;
        $confirmaSenha = trim($_POST['confirma_senha']) ? trim($_POST['confirma_senha']) : null;
  
        // Criar um Objeto usuario para persistência

        $usuario = new Usuario();
        $usuario->setNome($nome);
        $usuario->setEmail($email);
        $usuario->setSenhar($senhar);

        // Criar um usuario Controller
        $usuarioCont = new UsuarioController();
        $erros = $usuarioCont->inserir($usuario);

        // Verificar se a senha e a confirmação de senha coincidem
        if ($senhar !== $confirmaSenha) {
            $msgErro = "A senha e a confirmação de senha não coincidem. Por favor, tente novamente.";
        } else {
        if(! $erros) {
            // Redirecionar para o listar
            header("location: listar.php");
            exit;

        } else {
            $msgErro = implode("<br>",$erros);
            // print_r($erros);
        }

    }
}
    
// Inclui o formulario
include_once(__DIR__."/form.php");