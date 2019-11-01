<?php
$i = 0;

if (isset($_GET["a"])) {
    $i = $_GET["a"];
}

include '../controle/cadastrarNovoUsuarioAutoInvesting.php';
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- jquery - link cdn -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet"
	href="https://www.copytraderbrasil.com.br/css/backoffice/styleconsultor.css">

<link rel='stylesheet'
	href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
<!-- bootstrap - link cdn -->

<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
	integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
	crossorigin="anonymous">

<title>Pre Cadastro AutoInvesting MT BRASIL</title>
<link rel="icon" href="../imagens/favicon.png">
</head>
<style>
html, body {
	height: 100%;
}

body {
	overflow: hidden;
	background:
		url("https://i.pinimg.com/originals/0a/63/0b/0a630be2b073f47d06a784ab085d46b1.jpg");
}

html, p {
	font-family: "Gotham SSm A", "Gotham SSm B", "Helvetica Neue",
		sans-serif !important;
}

.collogin {
	box-shadow: 0 0 100px black;
	background-color: black;
	height: 100%;
}

.box-login img {
	width: 90%;
}

.box-login {
	padding-top: 5% !important;
	padding: 15%;
}
/*campos texto */
label {
	font-size: 18px;
	color: white;
}
/* botao enviar*/
.btn {
	border-color: white;
	font-family: "Gotham SSm A", "Gotham SSm B", "Helvetica Neue",
		sans-serif !important;
	font-size: 18px;
	color: white;
	background-color: #bb914a;
}
/* bloco erro*/
.form-control {
	border: 2px solid #bb914a7a
}

.errormsg {
	padding-top: 1%;
}

.rowtxtregister {
	padding-top: 2%;
}

.txtregister {
	font-family: "Gotham SSm A", "Gotham SSm B", "Helvetica Neue",
		sans-serif !important;
	font-size: 14px;
	color: white;
}

.btn:hover {
	background-color: white;
	color: black;
}

.provedor {
	color: #bb914a;
	margin-bottom: 2rem;
}

input {
	font-family: 'Helvetica', FontAwesome, sans-serif;
}

#prosseguir h4 {
	color: white !important;
	margin-bottom: 3rem;
}

.btnprosseguir {
	-webkit-appearance: initial;
	border: 1px solid transparent;
	border-radius: 30px !important;
	color: white !important;
	padding: 4% !important;
	background-color: #cc9966;
}

@media ( max-width : 65rem) {
	.collogin {
		max-width: 100%;
		flex: 100%;
		width: 100%;
	}
}
</style>
<body>

	<div id="navbar" class="navbar-collapse collapse">
		<ul class="nav navbar-nav navbar-left">
			<li><a href="/">HOME</a></li>
		</ul>
	</div>
	<!--/.nav-collapse -->


	<div class="container containerlogin h-100">
		<div class="row rowlogin h-100">
			<div class="col-6 mx-auto collogin">
				<div class="well box-login">
					<div class="col text-center">
						<a href="/"><img class="img-fluid" src="../images/logo.jpeg" /></a>
					</div>
					<div id="prosseguir" class="col text-center prosseguirbox collapse">
						<h4 class="mb-4">Prossiga para o pagamento</h4>
						<a href="pagamento.php" class="btnprosseguir" type="submit">Prosseguir</a>
					</div>
					<div id="cadastroform">
						<h4 class="provedor">Provedor de sinais: AutoInvesting</h4>

						<form role="form" action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
							<fieldset>
								<script>
              function concluir() {
              document.getElementById("cadastroform").style.display = 'none';
              document.getElementById("prosseguir").style.display = 'block';
              }
              </script>
<?php

if (isset($erro))
    echo '<div class="erro" style="color:#F00">' . utf8_encode($erro) . '</div><br/>';
else if (isset($sucesso))
    echo '<div style="color:#00f">' . utf8_encode($sucesso) . '</div><br/>', '<script type="text/javascript">', 'concluir();', '</script>';

?>
					<div class="form-group ls-login-user row">
									<div class="col">
										<label for="userLogin">Nome completo</label> <input
											class="form-control fontawesome ls-login-bg-user input-lg"
											id="nome" type="text" aria-label="Nome Completo" name="nome"
											placeholder="&#xf007; Insira seu nome completo">
									</div>
								</div>
								<div class="form-group ls-login-user row">
									<div class="col">
										<label for="email">E-mail</label> <input
											class="form-control ls-login-bg-password input-lg" id="email"
											type="text" aria-label="E-mail" name="emailUser"
											placeholder="&#xf0e0; Insira seu e-mail">
									</div>
								</div>
								<div class="form-group ls-login-user row">
									<div class="col">
										<label for="email">WhatsApp</label> <input
											class="form-control ls-login-bg-password input-lg"
											id="WhatsApp" type="text" aria-label="WhatsApp"
											name="WhatsApp" placeholder="&#xf232; Insira seu WhatsApp">
									</div>
								</div>
								<input type="hidden" value="<?php echo $i?>" name="indicacao">
								<div class="row">
									<div class="col">
										<input type="submit" value="Cadastrar"
											class="btn btn-primary btn-lg btn-block" />
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


</body>
</html>
