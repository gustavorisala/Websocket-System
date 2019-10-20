<?php
include '../controle/cadastrarNovoUsuarioCleyton.php';

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
<link href="style.css" rel="stylesheet">

<!-- bootstrap - link cdn -->

<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<title>Pre Cadastro Cleyton MT BRASIL</title>
<link rel="icon" href="../imagens/favicon.png">
</head>
<style>
html, body {
	height: 100%;
}

body {
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

.box-login {
}
.box-login img
{
	width: 70%;
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
.provedor
{
	color: #bb914a;
	margin-bottom: 2rem;
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
				<div class="row">
				<div class="well col-6 box-login mx-auto text-center">
					<a href="/"><img class="img-fluid" src="../images/logo.jpeg" /></a>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<h4 class="provedor">Provedor de sinais: Cleyton</h4>
				</div>
				</div>

				<div class="row">
					<div class="col">
						<h4 class="provedor">Faça seu registro na IQ Option</h4>
					</div>
					</div>

					<div class="row">
						<div class="col">
							<h4 class="provedor">Insira seu e-mail registrado</h4>
						</div>
						</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
