<?php
    require_once(__DIR__ . "/../login/verifica.php");
?>

    
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <title> CRUD TAREFAS</title>

    <style>


        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Josefin+Sans:wght@100&family=Lobster&family=Lora:ital,wght@0,400;1,400;1,500&family=Quicksand:wght@300;400;500;600&family=Tilt+Prism&display=swap');

        body{
            background-color: #81c9fa;
            /* Para Imagem
            background-size: 100% 100%;
            background-repeat: no-repeat;
            background-attachment: fixed; Opcional para evitar a rolagem */
        }
        
        h3{
            color: #b84aff;
        }
        h4{
            color: #7074ff;
        }
        h5{
            color: #5180fd;
        }

        form label{
            color: blue;
        }
        button{
            color: white;
            border: 1px solid transparent;
            border-radius: 0.60rem;
            background-color: #b84aff;
            padding: 2%;
        }

       /* .dark-mode {
        background-color: black;
        color: white;
        }

        .light-mode {
            background-color: white;
            color: black;
        }*/
    </style>
   
    <!--<script>
        
        function darkMode() {
       var element = document.body;
       var content = document.getElementById("DarkModetext");
       element.className = "dark-mode";
       content.innerText = "Dark Mode Ativo";
       }
       function lightMode() {
           var element = document.body;
           var content = document.getElementById("DarkModetext");
           element.className = "light-mode";
           content.innerText = "Dark Mode Desabilitado";
       }
   </script>-->

   

</head>

<body>

<div class="container mt-5">
        <div class="row">
            <div class="col-md-10 mx-auto my-5">
                <div class="border border-1 rounded-3 bg-white shadow p-3 mb-5 bg-body rounded">
        <!-- Será fechada no Foooter -->
    

    <?php
        include_once(__DIR__."/menu.php");
    ?>