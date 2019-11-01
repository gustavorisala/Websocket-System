

<?php
require_once '../controle/dadosConfigurarConta.php';

?>

<!doctype html>
<html lang="pt-br">
<head>
<script src="../js/clipboard.min.js"></script>
<title>Dados Cliente</title>
<link rel="icon" href="../imagens/favicon.png">
<!-- jquery - link cdn -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<!-- bootstrap - link cdn -->
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/configuracaoconta.css">

</head>
<body>
<style>
.sidebar li
{
    position: relative;
	font-size: 16px;
}
.sidebar img
{
	width: 15%;
	position: relative;
}
</style>
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
	</nav>
	<div class="container-fluid">
		<div class="row headerdados">
			<div class="col text-center">
				<h1>Pagina do usuário</h1>
			</div>
		</div>
	</div>


	<div class="container-fluid containerdados">
		<div class="row">
			<div id="menu" class="col-3 paineluser">


				<div class="dadosusuario">
					<ul class="sidebar">
						<h3>Dados pessoais</h3>
						<div class="d-flex">
						<img src="../images/gmail.svg"><li> <?=$dados_usuario['email']?></li>
					</div>
					<div class="d-flex">
						<img src="../images/password.svg"><li> <?=$dados_usuario['nome']?></li>
					</div>
					<div class="text-center mt-3">
						
						<?php
						
						if ($papel == "consultor") {
						    echo "<h3>Link afiliado </h3>";
						    include_once '../afiliacao/consultorlink.php';
						}
						if ($papel == "consultorM") {
						    echo "<h3>Link afiliado </h3>";
						    include_once '../afiliacao/consultorlinkM.php';
						}

						?>
					</div>
					</ul>
				</div>

			</div>

			<div class="col-9 colinfos formdados">
				<div class="container">
			<?php

if (isset($erro))
    echo '
			<div style="color: #F00">' . utf8_encode($erro) . '</div>
			<br /> <br />';
else if (isset($sucesso))
    echo '
			<div style="color: #00f">' . utf8_encode($sucesso) . '</div>
			<br /> <br />';
?>
			<div class="row">
						<div class="col-md-6 mx-auto colcel">
							<p class="alterartxt">Alterar Senha</p>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Senha atual</span>
								</div>
								<form class="" action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
									<input type="password" class="form-control"
										placeholder="Insira sua senha" aria-label="Senha atual"
										aria-describedby="basic-addon1" name="senhaatual">

							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon2">Nova senha</span>
								</div>
								<input type="password" class="form-control" minlength="5"
									placeholder="Insira a nova senha" aria-label="Nova senha"
									aria-describedby="basic-addon2" name="novasenha">
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon3">Confirmar
										senha</span>
								</div>
								<input type="password" class="form-control" minlength="5"
									placeholder="Repita a nova senha"
									aria-label="Repita a nova senha"
									aria-describedby="basic-addon3" name="confirmacaosenhanova">
							</div>
							<div class="col text-center p-0 pt-3">
								<button class="btn" type="submit">Confirmar</button>
							</div>

						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<footer class="page-footer font-small special-color-dark pt-4">

		<!-- Footer Elements -->
		<!-- Footer Elements -->

		<!-- Copyright -->
		<div class="footer-copyright text-center py-3">
			© 2019 Copyright <a href="#"> MTBrasil</a>
		</div>
		<!-- Copyright -->

	</footer>
	<!-- Footer -->
	<script>
			new ClipboardJS('.btn');
			</script>
</body>
</html>
