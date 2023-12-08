<?php
// Formulário para Tarefas
include_once(__DIR__ . "/../controller/ProjetoController.php");
include_once(__DIR__ . "/../controller/UsuarioController.php");
include_once(__DIR__ . "/../controller/TarefaController.php"); 

$idUsuarioLogado = 1;

$projetoController = new ProjetoController();
$projetos = $projetoController->listar($idUsuarioLogado);

$usuarioCont = new UsuarioController();
$usuarios = $usuarioCont->listarUsuarios();

$tarefaController = new TarefaController(); 

$msgErro = ''; 

if ($_SERVER['POST'] === 'POST') {
    // Recupera os dados do formulário
    $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : '';
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
    $dtCriacao = isset($_POST['dtCriacao']) ? $_POST['dtCriacao'] : '';
    $trStatus = isset($_POST['status']) ? $_POST['status'] : '';
    $idUsuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
    $idProjeto = isset($_POST['projeto']) ? $_POST['projeto'] : '';

    // Valide os dados conforme sua lógica
    if (empty($titulo) || empty($descricao) || empty($dtCriacao) || empty($trStatus) || empty($idUsuario) || empty($idProjeto)) {
        $msgErro = 'Preencha todos os campos.';
    } else {
        // Cria uma instância de Tarefa e define suas propriedades
        $tarefa = new Tarefa();
        $tarefa->setTitulo($titulo);
        $tarefa->setDescricao($descricao);
        $tarefa->setDtCriacao($dtCriacao);
        $tarefa->setTrStatus($trStatus);

        $projeto = new Projeto();
        $projeto->setId($idProjeto);
        $usuario = new Usuario();
        $usuario->setId($idUsuario);

        $tarefa->setProjeto($projeto);
        $tarefa->setUsuario($usuario);

        // Chama o controlador para salvar a tarefa
        $result = $tarefaController->salvar($tarefa);

        // Verifica se houve algum erro ao salvar
        $msgErro = "";
        if($erros)
            $msgErro = implode("<br>", $erros);

        echo $msgErro;
            }


    }
?>