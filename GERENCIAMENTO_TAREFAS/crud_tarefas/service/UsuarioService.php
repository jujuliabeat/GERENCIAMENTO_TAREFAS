<?php
// UsuarioService.php

require_once(__DIR__."/../model/Usuario.php");

    class UsuarioService {

        public function validarDados(Usuario $usuarioService) {
            $erros = array();

            // Validar nome
            if (! $usuarioService->getNome()) {
                array_push($erros, "Informe o Nome!");
            }

            if (! $usuarioService->getEmail()) {
                array_push($erros, "Informe um e-mail!");
            }

            if (! $usuarioService->getSenhar()) {
                array_push($erros, "Informe uma senha!");
                
            } 

              if($_SERVER["REQUEST_METHOD"] == "POST") {
                $confSenha = $_POST["confSenha"];
                if ($confSenha == $confSenha) {
                    // As senhas coincidem, você pode prosseguir com o registro do usuário
                    // Aqui você pode usar a classe UsuarioService para criar o usuário ou fazer outras operações.
                    echo "As senhas coincidem. Você pode prosseguir com o registro.";
                } else {
                    // As senhas não coincidem, exiba uma mensagem de erro
                    echo "As senhas não coincidem. Por favor, tente novamente.";
                }
            

            }   

            /*if ($senha !== $confirmarSenha) {
            array_push($erros, "A senha e a confirmação de senha não coincidem!");
            }*/

            return $erros;
     }
}
