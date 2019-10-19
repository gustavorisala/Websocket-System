<?php
require_once '../controle/dadosConsultor.php';

?>

<!doctype html>
<html lang="pt-br">
<head>

<title>Consultor</title>
<link rel="icon" href="../imagens/favicon.png">
<!-- jquery - link cdn -->
<meta charset="utf-8">
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<link rel="stylesheet"
	href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css" />
<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

<!-- Bootstrap CSS -->
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">

<!--  link href="../estilo2.css" rel="stylesheet"-->

</head>
<style>
.headerdados {
	background-color: black;
	color: white;
	border-bottom: 1px solid black;
	height: 10%;
	display: flex;
	justify-content: center;
	align-items: center;
}

.input-group-text {
	width: 150px;
	justify-content: center;
	padding: 10px;
	background-color: #bb914a;
	color: white;
}

.form-control {
	height: auto;
}

.btn {
	padding-left: 10%;
	padding-right: 10%;
	border-color: white;
	font-family: "Gotham SSm A", "Gotham SSm B", "Helvetica Neue",
		sans-serif !important;
	color: white;
	background-color: #bb914a;
}

.dadosuser {
	font-size: 20px !important;
}

.formdados {
	background-color: white !important;
	border: 1px solid;
	padding: 4%;
	border-color: gray;
	margin-bottom: 0px !important;
	margin-block-end: 0px !important;
	height: 100%;
}

.formdados h5 {
	font-size: 16px;
}

body {
	background:
		url("https://i.pinimg.com/originals/0a/63/0b/0a630be2b073f47d06a784ab085d46b1.jpg");
}

.paineluser {
	background-color: white;
}

.colinfos {
	padding: 0px !important;
}

footer {
	color: white;
	background-color: black;
	position: absolute;
	bottom: 0;
	width: 100%;
}

.paineluser {
	border: 1px solid;
}

.containerdados .row {
	
}
</style>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<button class="navbar-toggler" type="button" data-toggle="collapse"
			data-target="#conteudoNavbarSuportado"
			aria-controls="conteudoNavbarSuportado" aria-expanded="false"
			aria-label="Alterna navegação">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
			<ul class="navbar-nav mr-auto">
				<a class="navbar-brand" href="#"> <img class="ml-4"
					src="../images/logosemfundo.png" width="30" height="30" alt="">
				</a>
			</ul>
		<?php
include_once '../menus/consultor.php';
?>
	</div>
	</nav>

	<div class="container-fluid">
		<div class="row headerdados">
			<div class="col text-center">
				<h1>Relatório de operações</h1>
			</div>
		</div>
	</div>
	<div class="container-fluid containerdados">
		<div class="row" style="height: 65%;">
			<div id="menu" class="col-3 paineluser">
				<div class="dadosusuario"></div>

			</div>
			<div class="col-9 colinfos">
				<form class="formdados" action="<?=$_SERVER["PHP_SELF"]?>"
					method="POST">
					<div class="col-8 mx-auto">
						<p>Periodo</p>
						<div class="row">
							<div class="input-group col">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">De :</span>
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

							<div class="input-group col">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon2">Ate:</span>
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

						<div class="col text-center p-0 pt-3">
							<button class="btn" type="submit">Filtrar</button>
						</div>
				
				</form>


				<br>
				<div class="col text-center">
					<h1>Clientes aprovados no periodo: <?=$quantidadeDeClienteAprovado?></h1>
				</div>
				<br>


				<table class="table" style="width: 80%">
					<thead class="thead-dark">
						<tr>


							<th scope="col">Resultado no Periodo</th>
							<th scope="col">Moeda Corrente</th>
						</tr>

					</thead>




 <?php

if ($saldoOperacoes) {

    while ($row = mysqli_fetch_array($saldoOperacoes)) {

        echo "<tr >";
        echo "<th scope='row'>" . number_format($row['resultado'], 2, ',', '.') . "</th>";
        echo "<th scope='row'>" . $row['moedaCorrente'] . "</th>";
        echo "</tr> ";
    }
} else {
    echo utf8_encode('<tr><th>Sem Opera��es</th></tr>');
}

?>
    </table>
			</div>
		</div>
	</div>
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
</body>
</html>
