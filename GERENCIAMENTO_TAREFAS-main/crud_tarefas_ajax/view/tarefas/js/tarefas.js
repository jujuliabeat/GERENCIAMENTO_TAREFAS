//const baseURL = "/trabalhos/GERENCIAMENTO_TAREFAS/crud_tarefas_ajax";
const baseURL = "/GERENCIAMENTO_TAREFAS-main/crud_tarefas_ajax";


const inputDesc = document.getElementById('txtDesc');
const inputDtCriacao = document.getElementById('txtDtCriacao');

const inputStatus = document.getElementById('selStatus');

const inputUsuario = document.getElementById('selUsuario');
const inputProjeto = document.getElementById('selProjeto');

const divErros = document.getElementById('divMsgErro');

buscarProjeto();

function buscarProjeto() {

    while (inputProjeto.children.length > 0) {
        inputProjeto.children[0].remove();

    }


    criarOptionProjeto("---Selecione---", "", "--");

    var idSelecionado = inputProjeto.getAttribute("idSelecionado");


    var xhttp = new XMLHttpRequest()

    var url = baseURL + "/API/listar_por_usuario.php?idUsuario=" + inputUsuario.value;
    xhttp.open("GET", url);


    xhttp.onload = function () {

        console.log("Resposta recebida do Servidor");

        var json = xhttp.responseText;
        var projeto = JSON.parse(json);

        if(projeto)
            projeto.forEach(proj => {

                // console.log(disc.codigo)
                criarOptionProjeto(proj.nome, proj.id, idSelecionado);

            });

    }


    xhttp.send();
    console.log("Requisição Teste Enviada!");
    console.log("Dando certo!");
    console.log("Verifica!");

}
function criarOptionProjeto(proj, valor, valorSelecionado) {

    var option = document.createElement("option");
    option.innerHTML = proj;
    option.setAttribute("value", valor);

    if (valor == valorSelecionado)
        option.selected = true;

    inputProjeto.appendChild(option);

}
/*
function inserirTarefa() {


    var dados = new FormData();
    dados.append("dtCriacao", inputDtCriacao.value);
    dados.append("idUsuario", inputUsuario.value);
    dados.append("idProjeto", inputProjeto.value);


    var xhttp = new XMLHttpRequest();

    var url = baseURL + "/API/inserir_tarefa.php";

    xhttp.open("POST", url);

    xhttp.onload = function () {

        var resposta = xhttp.responseText;
        // console.log (resposta);
        if (resposta) {
            divErros.innerHTML = resposta;
            divErros.style.display = "block";
        } else {
            // redirecionar para a listagem 
            window.location = "listar.php";
        }


    }
    xhttp.send(dados);

}
*/

function validacao(event) {
    //1- Capturar os valores dos campos da tela

    var titulo = document.getElementById('txtTitulo').value;
    var descricao = document.getElementById('txtDesc').value;
    var dtCriacao = document.getElementById('txtDtCriacao').value;
    var status = document.getElementById('selStatus').value;
    var usuario = document.getElementById('selUsuario').value;
    var projeto = document.getElementById('selProjeto').value;

    var dados = new FormData();
    dados.append('titulo', titulo);
    dados.append('descricao', descricao);
    dados.append('dtCriacao', dtCriacao);
    dados.append('status', status);
    dados.append('usuario', usuario);
    dados.append('projeto', projeto);

    //2- Enviar os campos para a API por meio de uma requisição ajax

    var xhttp = new XMLHttpRequest();
    var url = baseURL + "/API/validacao.php";
    xhttp.open("POST", url);

    //3- Pegar as mensagens de retorno

    var teveErro = false;
    xhttp.onload = function () {
        console.log("As mensagens foram recebidas");

        //4- Veio Mensagens?
        var json = xhttp.responseText;
        if (json.length > 0) {
            teveErro = true;

            //4.1- SIM: Mostras as mensagens em uma div na tela e retorna false
            var mensagens = JSON.parse(json);

            var divErros = document.getElementById('divMsgErro');
            //console.log(mensagens.join('<br>'));
            divErros.innerHTML = mensagens.join('<br>');
            divErros.style.display = "block";
            //return false;
            
            //event.preventDefault();
        } else {
            //4.2- NÃO: retorna true
            return true;
        }
    };
    // 5- Enviar a requisição ajax com os dados do FormData
    xhttp.send(dados);

    return false;
}




