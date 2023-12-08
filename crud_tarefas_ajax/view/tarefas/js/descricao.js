const baseURL = "/trabalhos/GERENCIAMENTO_TAREFAS/crud_tarefas_ajax";
const inputBuscarId = document.getElementById('idDescricao');

function mostrarDescricao(idDescricao, idAvaliacao) {
    //Requisição AJAX para trazer os dados da avaliação
    var xhttp = new XMLHttpRequest();

    var url = baseUrl + "/api/buscarAvaliacao.php" + "?idAvaliacao=" + idAvaliacao;
    xhttp.open("GET", url);

    //Funcão de retorno executada após a 
    //resposta do servidor chegar no cliente
    xhttp.onload = function() {
        //Resposta da requisição

        console.log("Resposta recebida do servidor!");

        var divDescricao = document.getElementById("divDescricao");
            if (divDescricao.style.display === 'none') {
                divDescricao.style.display = 'block'; 
            }

        var json = xhttp.responseText;
        console.log(json);

        var avaliacao = JSON.parse(json);

        const spnNome = document.querySelector("#spnNome");
        spnNome.innerHTML = avaliacao.nome;
        const spnData = document.querySelector("#spnData");
        spnData.innerHTML = avaliacao.data;
        const spnTipo = document.querySelector("#spnTipo");
        spnTipo.innerHTML = avaliacao.tipo.tipo;
        const spnGenero = document.querySelector("#spnGenero");
        spnGenero.innerHTML = avaliacao.genero.genero;
        const spnEntretenimento = document.querySelector("#spnEntretenimento");
        spnEntretenimento.innerHTML = avaliacao.entretenimento;
        const spnAvaliacao = document.querySelector("#spnAvaliacao");
        spnAvaliacao.innerHTML = avaliacao.avaliacao;

    }
    xhttp.send();

}