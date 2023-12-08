<?php

// Obtém os dados do formulário
$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];
$dtCriacao = $_POST["dtCriacao"];
$status = $_POST["status"];
$usuario = $_POST["usuario"];
$projeto = $_POST["projeto"];

$mensagensErro = array();

if (empty($titulo)) {
    $mensagensErro[] = "O campo Título é obrigatório.";
}

if (empty($descricao)) {
    $mensagensErro[] = "O campo Descrição é obrigatório.";
}

if (empty($dtCriacao)) {
    $mensagensErro[] = "A data é obrigatória.";
}

if (empty($status)) {
    $mensagensErro[] = "O Status do Projeto é obrigatório.";
}

if (empty($usuario)) {
    $mensagensErro[] = "O usuário é obrigatório.";
}

if (empty($projeto)) {
    $mensagensErro[] = "O projeto é obrigatório.";
}

echo json_encode($mensagensErro);


?>
