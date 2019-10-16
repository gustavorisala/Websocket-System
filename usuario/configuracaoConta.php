<?php
require_once '../controle/dadosConfigurarConta.php';

?>

<!doctype html>
<html lang="pt-br">
<head>


<title>Dados Cliente</title>
<link rel="icon" href="../imagens/favicon.png">
<!-- jquery - link cdn -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<!-- bootstrap - link cdn -->
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


</head>

<body style="width: 100%;">


	<div id="menu">

<?php

if ($papel == "cliente") {
    include_once '../menus/cliente.php';
}

if ($papel == "consultor") {
    include_once '../menus/consultor.php';
}

if ($papel == "consultorM") {
    include_once '../menus/consultorMaster.php';
}

if ($papel == "admin") {
    include_once '../menus/admin.php';
}
?>

</div>



	<div align="center">

		<form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">


			<div>
				<h4>E-MAIL: <?=$dados_usuario['email']?><h4>
			
			</div>
			<br>
			<div>
				<h4>Nome: <?=$dados_usuario['nome']?><h4>
			
			</div>
			<br>
			<div>
				<h4>
					link Indicacao: https://copytraderbrasil.com.br?a=<?=$dados_usuario['codigoindicacao']?>
					<h4>
			
			</div>
			<br><?php

if (isset($erro))
    echo '
			<div style="color: #F00">' . utf8_encode($erro) . '</div>
			<br /> <br />';
else if (isset($sucesso))
    echo '
			<div style="color: #00f">' . utf8_encode($sucesso) . '</div>
			<br /> <br />';
?>

			<div>
				<p>Alterar Senha</p>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Senha Atual</span>
					</div>
					<input type="password" class="form-control"
						placeholder="Senha Atual" aria-label="Senha Atual"
						aria-describedby="basic-addon1" name="senhaatual">
				</div>

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon2">Nova Senha</span>
					</div>
					<input type="password" class="form-control" minlength="5"
						placeholder="Nova Senha" aria-label="Nova Senha"
						aria-describedby="basic-addon2" name="novasenha">
				</div>

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon3">Confirmar Nova
							Senha</span>
					</div>
					<input type="password" class="form-control" minlength="5"
						placeholder="Confirmar Nova Senha"
						aria-label="Confirmar Nova Senha" aria-describedby="basic-addon3"
						name="confirmacaosenhanova">
				</div>

				<button class="btn btn-primary" type="submit">Enviar</button>

			</div>


		</form>
	</div>



</body>
</html>
