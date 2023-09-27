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

            /*if ($senha !== $confirmarSenha) {
            array_push($erros, "A senha e a confirmação de senha não coincidem!");
            }*/

            return $erros;
     }
}