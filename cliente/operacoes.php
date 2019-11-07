<?php
session_start();

if (! isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
}
$id_usuario = $_SESSION['id_usuario'];
require_once '../controle/operacoesIQ.php';

?>

<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Dados Cliente</title>
<link rel="icon" href="../imagens/favicon.png">
<!-- jquery - link cdn -->

<link rel="stylesheet"
	href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css" />
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<!-- bootstrap - link cdn -->
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.copytraderbrasil.com.br/css/backoffice/stylecliente.css">

</head>
<style>
body
{
  width: 100% !important;
}
.dado
{
  background-color: #e9ecef;
  color: white;
  padding: 2%;
}
.informacoes .col
{
  display: flex;
    justify-content: center;
    align-items: center;
}
#blocodados
{
  margin-top: 20vh;
}
.colinform
{
  border: 1px solid;
}
.selectperiodo
{
  border-bottom: 1px solid;
  margin-bottom: 3rem;
  display: flex;
    justify-content: center;
    align-items: center;
    background-color: #e9ecef;
    color: black;
    padding-top: 2%;
    padding-bottom: 2%;
    padding-left: 0%;
    padding-right: 0%;
}
.btn
{
  background-color: #e9ecef !important;
  color: black !important;
}
.filtro
{
  background-color: #e9ecef !important;
  color: black !important;
}
.periodocol
{
  background-color: white;
  padding-left: 0%;
  padding-right: 0%;
  border: 1px solid;
}
.calendario
{
  text-align: center;
  padding: 3%;
}
.rendimentos
{
  padding: 2%;
 border-bottom: 2px solid gray;
}
.saldo h5, .rendvalor h5, .saldo
{
  display: flex;
    justify-content: center;
    align-items: center;
margin-bottom: 0px;
  font-size: 1.1rem !important;
}
.saldotxt
{
  padding: 4%;
  display: flex;
    justify-content: center;
    align-items: center;
  background-color: #e9ecef;
}

.saldovalor
{
  padding: 4%;
  display: flex;
    justify-content: center;
    align-items: center;
  background-color: white;
}
.saldocol
{
  border: 1px solid gray;
}
.barraordens
{
  margin-top: 3rem;
  background-color: #e9ecef;
  color: black;
  padding: 1%;
  border: 1px solid;
}
footer
{
  position: fixed;
  bottom: 0;
}
#tableordens
{
  margin-bottom: 30vh;
}
.tabelaordens .table, .table
{
  background-color: white;
}
.tabelaordens
{
  padding: 0px;
}
@media (max-width: 575.98px)
{
  .tabelaordens
  {
    padding-left: 0px;
  }
  .barraordens
  {
    width: 100%;
    flex: 100%;
    max-width: 100%;
  }
  footer
  {
    position: fixed;
    bottom: 0;
  }
  .table .thead-dark th
  {
    font-size: 10px;
  }
}
.main
{
  background-size: cover;
  background-image: url(../images/3.jpeg);
}
</style>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button id="navtoggle" class="navbar-toggler" type="button" data-toggle="collapse"
      data-target="#conteudoNavbarSuportado"
      aria-controls="conteudoNavbarSuportado" aria-expanded="false"
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
    <h1>Entradas</h1>
    </div>
  </div>
</div>
<div class="container-fluid main">
  <div class="row">
<div class="col">
  <div class="row mt-5">
    <div class="col-sm-6 col-12 mx-auto periodocol">
	<form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
    <div class="col selectperiodo">
    <h4>Selecione o periodo</h4>
  </div>
  <div class="row mb-4">
  <div class="input-group col-6 datafiltro">
    <div class="input-group-prepend">
      <span class="input-group-text filtro" id="basic-addon1">De :</span>
    </div>
    <input type="text" id="calendarioInicio" name="calendarioI"
      class="form-control" aria-describedby="basic-addon1"
      value="<?php echo $dataInicio ?>" />

  </div>
  <script>
$(function() {
$( "#calendarioInicio" ).datepicker({dateFormat: 'dd/mm/yy'});
});
</script>

<div class="input-group col-6 datafiltro">
  <div class="input-group-prepend">
    <span class="input-group-text filtro" id="basic-addon2">Ate:</span>
  </div>
  <input type="text" id="calendarioFim" name="calendarioF"
    class="form-control" aria-describedby="basic-addon2"
    value="<?php echo $dataFinal ?>" />
</div>
<script>
$(function() {
$( "#calendarioFim" ).datepicker({dateFormat: 'dd/mm/yy'});
});
</script>
</div>
    <div class="col text-center">
		<input class="btn" type='submit' value='Filtrar'><br>
    </div>

    <div class="row mt-4 mb-4 ">
      <div class="col-4 mx-auto rendimentos">
        <div class="row">
    	<div class="col text-center saldo"><h5>Rendimentos:</h></div> <div class="col rendvalor"><h5><?=$saldo ?> <?=$moeda ?></h5></div>
    </div>
    </div>
    </div>
	</form>
</div>
</div>
</div>
<div id="tableordens" class="container-fluid">
  <div class="row">
    <div class="col-12 mx-auto text-center barraordens">
      <h1>Ordens</h1>
    </div>
    <div class="col tabelaordens">
	<table class="table">
	<thead class="thead-dark">
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Ativo</th>
				<th scope="col">Modo</th>
				<th scope="col">Sentido</th>
				<th scope="col">Hora Abertura</th>
				<th scope="col">Expiracao</th>
				<th scope="col">Preco Abertura</th>
				<th scope="col">Preco Fechamento</th>
				<th scope="col">Resultado</th>
			</tr>
		</thead>
                   <?php

                if (mysqli_num_rows($dados) > 0) {

                    while ($row = mysqli_fetch_array($dados)) {

                        echo "<tr>";
                        echo "<th scope='row'>" . $row['idOperacao'] . "</th>";

                        $moeda = "";
                        if ($row['idAtivo'] == 1) {
                            $moeda = "EUR/USD";
                        }

                        if ($row['idAtivo'] == 6) {
                            $moeda = "USD/JPY";
                        }

                        if ($row['idAtivo'] == 5) {
                            $moeda = "GBP/USD";
                        }

                        echo "<th scope='row'>" . $moeda . "</th>";

                        echo "<th scope='row'>" . $row['tipo'] . "</th>";
                        echo "<th scope='row'>" . $row['direcao'] . "</th>";
                        echo "<th scope='row'>" . date("d/m/y H:i:s", $row['tempoAbertura']) . "</th>";
                        echo "<th scope='row'>" . date("d/m/y H:i:s", $row['expiracao']) . "</th>";
                        echo "<th scope='row'>" . $row['precoAbertura'] . "</th>";
                        echo "<th scope='row'>" . $row['precoFechamento'] . "</th>";

                        echo "<th scope='row'>$" . number_format($row['resultado'], 2, ',', '.') . "</th>";
                        echo "</tr>";
                    }
                } else {
                    echo '<tr><th scope"row">N/A<th></tr>';
                }

                ?>
          </table>
        </div>
      </div>
</div>
</div>
</div>
</div>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

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
