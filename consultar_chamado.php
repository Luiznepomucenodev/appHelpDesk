<?php
  require_once("validadorAcesso.php");
  require_once("menu.php");
?>

<?php
  $chamados = array();

  $arquivo = fopen("../../../xampp/appHelpDesk/arquivo.txt","r ");

  while (!feof($arquivo)) {
    $line = fgets($arquivo);
    $chamados[] = $line;
    }

  fclose($arquivo);
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            <div class="card-body">

            <?php foreach ($chamados as $line) { ?>
              <?php
                $dadosChamados = explode("#", $line);
                if($_SESSION["perfilId"] == 2){
                  if($_SESSION["id"] != $dadosChamados[0]){
                    continue;
                  }
                }
                if( count($dadosChamados) < 3) {
                  continue;
                };             
              ?>
              
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?= $dadosChamados[1]?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $dadosChamados[2]?></h6>
                  <p class="card-text"><?= $dadosChamados[3]?></p>
                </div>
              </div>

              <?php } ?>

              <div class="row mt-5">
                <div class="col-6">
                <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>