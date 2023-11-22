<?php

// Página view para listagem de Tarefa
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(__DIR__ . "/../../controller/LoginController.php");

$msgErro = "";
$usuario = "";
$senha = "";

if (isset($_POST['submetido'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $loginCont = new LoginController();
    $erros = $loginCont->logar($usuario, $senha);


    // Redirecionar para a página inicial

    if(! $erros) {
        header ("location: ". BASE_URL);
        exit;
    }

    // Se tiver erros, exibe-os
    $msgErro = implode("<br>", $erros);

    //echo $msgErro;

    //echo $usuario . " - " . $senha;
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>

    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title> CRUD ALUNOS</title>

    <style>

            body{
                background-color: #81c9fa;
                /* Para Imagem
                background-size: 100% 100%;
                background-repeat: no-repeat;
                background-attachment: fixed; Opcional para evitar a rolagem */
            }

            h3{
                font-weight:bold;
                font-size:xx-large;
            }

            h4{
                color: #7074ff;
            }
            h5{
                color: #5180fd;
            }

            form label{
                color: #a46ffc;
            }

            button {
            color: white;
            border: 1px solid transparent;
            border-radius: 0.60rem;
            background-color: #b84aff;
            padding: 2%;
            }

            .content{
                width: 70%;
                min-height: 60%;    
                margin: 0px auto;
                position: relative;   
                }

    </style>

</head>

<body>

        <div class="container vh">
            <div class="content">
                    <div class="row mb-3 text-center">
                        <div class="col-12 mt-5">
                            <h3 style="color: #9b6bb3;" class="fs-2 fw-bold">Login</h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 alert alert-info" style="background-color: white; color:white">
                            <form action="" method="POST" class="rounded">

                                <div class="from-group mt-2">
                                    <label for="txtUsu">Usuário</label>
                                    <input id="txtUsu" type="text" name="usuario" id="form-control" class="form-control" value="<?= $usuario ?>">
                                </div>

                                <div class="from-group mt-3">
                                    <label for="txtSenha">Senha</label>
                                    <input id="txtSenha" type="password" name="senha" id="form-control" class="form-control" value="<?= $senha ?>">
                                </div>

                                <br>

                                <input type="hidden" name="submetido" value="1">

                                <button class="rounded border-0 p-2 card-link text-decoration-none text-white" >Entrar</button>

                            </form>
                        </div>


                        <div class="col-6">
                            <?php if ($msgErro) : ?>

                                <div class="alert alert-danger">
                                    <?= $msgErro; ?>
                                </div>
                            <?php endif ?>

                        </div>
                </div>
            </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>