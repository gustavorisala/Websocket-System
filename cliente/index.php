<?php
require_once '../controle/clienteHome.php';
if ($atual == 'completo') {
    ?>

<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Cliente HOME</title>
<link rel="icon" href="../imagens/favicon.png">
<!-- jquery - link cdn -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<!-- bootstrap - link cdn -->
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/stylecliente.css">

</head>
<style>
.dado
{
  border: 1px solid black;
  background-color: #bb914a;
  color: white;
  padding: 2%;
}
.informacoes .col-4
{
  display: flex;
    justify-content: center;
    align-items: center;
    font-size: 18px;
}
#blocodados
{
  margin-top: 14vh;
}
.colinform
{
  border: 1px solid;
}
.resultado
{
  font-size: 1rem !important;
  font-weight: bold;
  display: flex;
    justify-content: center;
    align-items: center;
}
</style>
<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<button id="navtoggle" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado"
				aria-controls="#conteudoNavbarSuportado" aria-expanded="false"
				aria-label="Alterna navegação">
				<span class="navbar-toggler-icon"></span>
			</button>
      <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
				<ul class="navbar-nav mr-auto">
					<a class="navbar-brand" href="#"> <img class="ml-4"
						src="../images/logosemfundo.png" width="80" alt="">
					</a>
				</ul>
	  <?php
    include_once '../menus/cliente.php';
    ?>
	  </div>
		</nav>
  	<div class="container-fluid">
  		<div class="row headerdados">
  			<div class="col text-center">
      	<h2>Provedor de Sinais: <?=$provedor?></h2>
  			</div>
  		</div>
	</div>
		<form id="blocodados" method="post" action="dadosCliente.php">


			<div class="container-fluid informacoes">
        <div class="row">
          <div class="col-sm-4 col-12 mx-auto colinform">
            <div class="row">
              <div class="col-4 dado">
              Email:
              </div>
              <div class="col resultado">
              <?=$email?>
      </div>
      </div>
      <div class="row">
        <div class="col-4 dado">
      	Nome:
      </div>
          <div class="col resultado">
        <?=$nome?>
      </div>
      </div>
      <div class="row">
        <div class="col-4 dado">
				Validade Licença:
        </div>
        <div class="col resultado">
          <?php echo date('d/m/Y',strtotime($validade));?></p>
      </div>
      </div>
      <div class="row">
        <div class="col-4 dado">
        Lucro IQ Option <br>(Ultimos 30 dias) :
        </div>
        <div class="col resultado">
          <?=$saldo?> <?=$moeda?>
      </div>
      </div>
      </div>
      </div>
		</form>
	</div>
  <footer class="page-footer font-small special-color-dark pt-4">

		<!-- Footer Elements -->
		<!-- Footer Elements -->

		<!-- Copyright -->
		<div class="footer-copyright text-center py-3">
			© 2019 Copyright <a href="#"> MTBrasil</a>
		</div>
		<!-- Copyright -->

	</footer>
<script>
$("#navtoggle").click(function(){
  $("#conteudoNavbarSuportado").toggle();
});
</script>
</body>
</html>

<?php
}
?>
