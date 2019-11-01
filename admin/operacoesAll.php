<?php
require_once '../controle/dadosConsultorMaster.php';
?>
<!doctype html>
<html lang="pt-br">
<head>

<title>Consultor Master</title>
<link rel="icon" href="../imagens/favicon.png">
<!-- jquery - link cdn -->

<meta charset="utf-8">
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<link rel="stylesheet"
	href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css" />
<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<link rel="stylesheet" href="../css/styleconsultor.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">

<!--  link href="../estilo2.css" rel="stylesheet"-->

</head>
<style>
</style>
<body>
	<nav id="barranav" class="navbar navbar-expand-lg navbar-light bg-light">
		<button class="navbar-toggler" type="button" data-toggle="collapse"
			data-target="#conteudoNavbarSuportado"
			aria-controls="conteudoNavbarSuportado" aria-expanded="false"
			aria-label="Alterna navegação">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
			<ul class="navbar-nav mr-auto">
				<a class="navbar-brand" href="#"> <img class="ml-4 logotipo"
					src="../images/logosemfundo.png" alt="">
				</a>
			</ul>
			<?php
include_once '../menus/consultorMaster.php';
?>
	</div>
	</nav>

	<div class="container-fluid">
		<div class="row headerdados">
			<div class="col text-center">
				<h1>Relatório de todas operações</h1>
			</div>
		</div>
	</div>
	<div class="container-fluid containerdados">
		<div class="row conteudo">

			<div class="col mx-auto colinfos">
				<form class="formdados" action="<?=$_SERVER["PHP_SELF"]?>"
					method="POST">
					<div class="col-8 mx-auto">
						<div class="col centralizar mb-3">
							<h3>Selecione o periodo</h3>
						</div>
						<div class="row centralizar">
							<div class="input-group col-4 datafiltro">
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

							<div class="input-group col-4 datafiltro">
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

						<div class="col text-center p-0 pt-4">
							<button class="btn" type="submit">Filtrar</button>
						</div>

				</form>

<br>
</div>
</div>
</div>
</div>
<style>
#barranav {
    box-shadow: 0 0px 0px 3px #bb914a;
}
.formdados
{
	border: 0px;
}
body
{
	background-image: none;
	background-color: white !important;
}
.containerdados .conteudo
{
	height: auto !important;
}
.table .thead-dark th
{
	border: 1px solid;
	background-color: #bb914a;

}
</style>
<div class="container">
				<div class="row">
				<div class="col mx-auto">
					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">ID Operação</th>
								<th scope="col">Ativo</th>
								<th scope="col">Modo</th>
								<th scope="col">Sentido</th>
								<th scope="col">Hora Abertura</th>
								<th scope="col">Expiração</th>
								<th scope="col">Preço Abertura</th>
								<th scope="col">Preço Fechamento</th>
								<th scope="col">Resultado</th>
								<th scope="col">Moeda</th>
							</tr>

						</thead>







			 <?php

    if ($todosOperacoes) {

        while ($row = mysqli_fetch_array($todosOperacoes)) {

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
            echo "<th scope='row'>" . $row['moedaCorrente'] . "</th>";
            echo "</tr>";
        }
    } else {
        echo utf8_encode('<tr><th>Sem Opera��es</th></tr>');
    }

    ?>
</table>
</div>
				</div>
			</div>
	<footer class="fixed-bottom page-footer font-small special-color-dark pt-4">

		<!-- Footer Elements -->
		<!-- Footer Elements -->

		<!-- Copyright -->
		<div class="footer-copyright text-center py-3">
			© 2019 Copyright <a href="#"> MTBrasil</a>
		</div>
		<!-- Copyright -->

	</footer>
</body>
</html>
