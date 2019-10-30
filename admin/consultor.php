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
<link rel="stylesheet"
	href="https://www.copytraderbrasil.com.br/css/backoffice/styleconsultor.css">

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
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<button class="navbar-toggler" type="button" data-toggle="collapse"
			data-target="#conteudoNavbarSuportado"
			aria-controls="conteudoNavbarSuportado" aria-expanded="false"
			aria-label="Alterna navegação">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
			<ul class="navbar-nav mr-auto">
				<a class="navbar-brand" href="#">
					<img class="ml-4 logotipo" src="../images/logosemfundo.png" alt="">
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
		<div class="row conteudo">
			<!--
			<div id="menu" class="col-3 paineluser">
				<div class="dadosusuario">
					<ul class="sidebar"><h3>Dados pessoais</h3>
					<li><img src="../images/gmail.svg"> <?=$dados_usuario['email']?></li>
					<li><img src="../images/password.svg"> <?=$dados_usuario['nome']?></li>
					<li><img src="../images/link.svg"> <a href="https://copytraderbrasil.com.br?a=<?=$dados_usuario['codigoindicacao']?>">Copiar Link</a></li>

				</ul>
				</div>

			</div>
		-->
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
				<div class="col text-center aprovados">
					<h4>Clientes aprovados no periodo: <?=$quantidadeDeClienteAprovado?></span></h4>
					<h4>Rendimento: R$ <?php echo number_format(($quantidadeDeClienteAprovado*40), 2, ',', '.');?></span></h4>
				</div>
				<br>

				<div class="col-7 mx-auto">
				<table class="table">
					<thead class="thead-dark">
						<tr>
							<th class="colresult" scope="col" style="width: 70%; text-align: center;">Nome</th>

						</tr>

					</thead>




 <?php

 if ($novosClientesNome) {

     while ($row = mysqli_fetch_array($novosClientesNome)) {

        echo "<tr >";
        echo "<th class='colresult' scope='row'>" . $row['nome']. "</th>";

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
