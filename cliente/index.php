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
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


</head>

<body style="width: 100%;">
	<div id="menu">

<?php
    include_once '../menus/cliente.php';
    ?>

</div>
	<div align="center">
		<form method="post" action="dadosCliente.php">


			<div>
				<p>Email: <?=$email?></p>
				<br>
				<p>Nome: <?=$nome?></p>
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
