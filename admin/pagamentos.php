<?php
require_once '../controle/dadosPagamentos.php';
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
				<a class="navbar-brand" href="#"> <img class="ml-4 logotipo"
					src="../images/logosemfundo.png" alt="">
				</a>
			</ul>
		<?php
if ($papel == "consultor") {
    include_once '../menus/consultor.php';
}

if ($papel == "consultorM") {
    include_once '../menus/consultorMaster.php';
}
?>
	</div>
	</nav>
<style>
</style>
<div class="container-fluid">
		<div class="row headerdados">
			<div class="col text-center">
				<h1>Escolha seu metodo de recebimento</h1>
			</div>
		</div>
	</div>
	<div class="container-fluid containerdados mt-5">
		<div class="row conteudo">
			<div class="col-3 mx-auto colinfos">
				<form class="formdados" action="<?=$_SERVER["PHP_SELF"]?>"
					method="POST">
					<div class="col text-center mb-4">
						<img class="img-fluid" src="../images/pagseguro.gif">
					</div>
					<p><?php if(isset($Sucesso)) echo $Sucesso;?>
					<input type="text" class="form-control"
							placeholder="E-mail do Pagseguro" aria-label="Pagseguro"
							aria-describedby="basic-addon2" name="Pagseguro"
							value="<?=$Pagseguro?>"> <input type='submit' value='Salvar'><br>

				</form>
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
