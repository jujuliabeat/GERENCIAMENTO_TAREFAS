<?php
// Classe service para tarefa
    require_once(__DIR__."/../model/Tarefa.php");

    class TarefaService {

        public function validarDados(Tarefa $tarefaService) {
            $erros = array();
            
            // Validar nome
            if (! $tarefaService->getTitulo()) {
                array_push($erros, "Informe o Título!");

            } if (! $tarefaService->getDescricao()) {
                array_push($erros, "Informe a Descrição!");

            } if (! $tarefaService->getDtCriacao()) {
                array_push($erros, "Informe a data de criação!");

            } if (! $tarefaService->getTrStatus()) {
                array_push($erros, "Informe os status!");
            }

            /*/if(! $tarefaService->getCurso()) {
                array_push($erros, "Informe o curso!");
            }/*/

            return $erros;
            
        }
    }