<?php
require_once '../controle/clienteHome.php';
if ($atual == 'completo') {
    ?>

<!doctype html>
<html lang="pt-br">
<head>


<title>Cliente HOME</title>
<link rel="icon" href="../imagens/favicon.png">
<!-- jquery - link cdn -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<!-- bootstrap - link cdn -->
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


</head>

<body style="width: 100%;">
	<div id="menu">
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
    include_once '../menus/cliente.php';
    ?>
	  </div>
		</nav>
	</div>
	<div>
		<h2>Provedor de Sinais: <?=$provedor?></p>
	</div>
	<div align="center">
		<form method="post" action="dadosCliente.php">


			<div>
				<p>Email: <?=$email?></p>

				<p>Nome: <?=$nome?></p>

				<p>Validade Licenca  IQ: <?php echo date('d/m/Y',strtotime($validade));?></p>
			</div>

			<div>
				<p>Resultado IQ ultimos 30 dias : <?=$saldo?> <?=$moeda?> </p>
			</div>
		</form>
	</div>



</body>
</html>

<?php
}
?>
