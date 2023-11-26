<?php
//Teste de conexão
// require_once(__DIR__ . "/util/Connection.php");
// $connection = Connection::getConnection();
// print_r($connection);

include_once(__DIR__ . "/view/include/header.php");
?>


<div class="container p-4">
  <div class="row">
    <div class="col-md-7">
      <div class="text">
        <h3 class="text-center mb-5 fw-bolder">Bem-vindo ao seu Mural!</h3>
        <h4 class="text-center mb-5 fw-normal">Mantenha o controle. Conquiste seus objetivos.</h4>
        <p class=" fw-normal lh-base">
          Às vezes, a vida é uma lista interminável de tarefas. Manter-se organizado pode ser a chave para o sucesso.
          <br> Com nossa plataforma de gerenciamento de tarefas, oferecemos a você a ferramenta necessária para assumir o
          controle.
          <br><br> Registre sueus afazeres, defina prazos, acompanhe o progresso e alcance mais em menos tempo. Deixe para
          trás a sensação de esquecimento e a desordem.

        </p>
      </div>
    </div>
    <div class="col-md-5">
      <div class="icone d-flex justify-content-center align-items-center">
        <div class="card text-center border-0">
          <img class="card-image-top mx-auto p-4" src="img/bruxo.png" style="max-width: 75%; height: auto;" />
          <div class="card-body">
            <h5 class="card-title">Verifique as tarefas de hoje</h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <button><a href="<?= BASE_URL ?>/view/tarefas/listar.php" class="card-link text-decoration-none text-white">Lembretes</a></button>
            </li>
          </ul>
        </div>
      </div>
    </div>
    
  </div>
</div>

<div>
 

<?php
include_once(__DIR__ . "/view/include/footer.php");
?>