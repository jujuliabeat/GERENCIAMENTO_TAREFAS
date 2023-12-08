const baseURL = "/trabalhos/GERENCIAMENTO_TAREFAS/crud_tarefas_ajax";

const inputDesc = document.getElementById('txtDesc');
const inputDtCriacao= document.getElementById('txtDtCriacao');

const inputStatus = document.getElementById('selStatus');

const inputUsuario = document.getElementById('selUsuario');
const inputProjeto = document.getElementById('selProjeto');

const divErros = document.getElementById('divMsgErro');

buscarProjeto();

function buscarProjeto() {
    
    while(inputProjeto.children.length > 0 )  {
        inputProjeto.children[0].remove();

    }

    
    criarOptionProjeto("---Selecione---", "", "--");
    
    var idSelecionado = inputProjeto.getAttribute("idSelecionado");

    
    var xhttp = new XMLHttpRequest()
    
    var url = baseURL + "/API/listar_por_usuario.php?idUsuario=" + inputUsuario.value;
    xhttp.open("GET", url);

    // Função de retorno executada após a resposta chegar no cliente 
    xhttp.onload = function() {

        // Resposta da requisição --- Callbek
        console.log("Resposta recebida do Servidor");
        
        var json = xhttp.responseText;
        var projetos = JSON.parse(json);

        projetos.forEach(proj => {

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

        if(valor == valorSelecionado)
            option.selected = true;
        
        inputProjeto.appendChild(option);

}
    function inserirTarefa() {

        
        var dados = new FormData();
            dados.append("dtCriacao", inputDtCriacao.value);
            dados.append("idUsuario", inputUsuario.value);
            dados.append("idProjeto", inputProjeto.value);


        var xhttp = new XMLHttpRequest();

        var url = baseURL + "/API/inserir_tarefa.php";

        xhttp.open("POST", url);

        xhttp.onload = function() {

            var resposta = xhttp.responseText;
            // console.log (resposta);
            if(resposta) {
                divErros.innerHTML = resposta;
                divErros.style.display = "block";
            } else {
                // redirecionar para a listagem 
                window.location = "listar.php";
            }


        }
        xhttp.send(dados);

    }