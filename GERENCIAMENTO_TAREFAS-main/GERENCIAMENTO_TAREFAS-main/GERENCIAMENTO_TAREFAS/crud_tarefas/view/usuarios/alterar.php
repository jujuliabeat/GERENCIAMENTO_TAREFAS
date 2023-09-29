<?php 
//View para alterar tarefas

require_once(__DIR__ . "/../../controller/UsuarioController.php");
require_once(__DIR__ . "/../../model/Tarefa.php");
require_once(__DIR__ . "/../../model/Projeto.php");
require_once(__DIR__ . "/../../model/Usuario.php");

$msgErro = "";
$usuario = null;

$usuarioCont = new UsuarioController();

if (isset($_POST['submetido'])) {
    // echo 'clicou no gravar';
    $nome = trim($_POST['nome']) ? trim($_POST['nome']) : null;
    $email = trim($_POST['email']) ? trim($_POST['email']) : null;
    $senhar = trim($_POST['senhar']) ? trim($_POST['senhar']) : null;
    $confirmaSenha = trim($_POST['confirma_senha']) ? trim($_POST['confirma_senha']) : null;

    $idUsuario = $_POST['id'];
    
    // Criar um Objeto usuario para persistência

    $usuario = new Usuario();
    $usuario->setNome($nome);
    $usuario->setEmail($email);
    $usuario->setSenhar($senhar);

    // Criar um usuario Controller
    $usuarioCont = new UsuarioController();
    $erros = $usuarioCont->inserir($usuario);

    if ($senhar !== $confirmaSenha) {
        $msgErro = "A senha e a confirmação de senha não coincidem. Por favor, tente novamente.";
    } else if(! $erros) {
        // Redirecionar para o listar
        header("location: listar.php");
        exit;

    } 
}else {
    //Usuário apenas entrou na página para alterar
    $idUsuario = 0;
    if(isset($_GET['idUsuario']))
        $idUsuario = $_GET['idUsuario'];

    
    $usuario =  $usuarioCont->buscarPorId($idUsuario);
    // print_r($tarefa);
    if(! $usuario) {
        echo "Usuario não encontrada!<br>";
        echo "<a href='listar.php'><br>Voltar</a>";
        exit;
    }
}

//Inclui o formulário
include_once(__DIR__ . "/form.php");