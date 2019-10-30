<?php
include 'controle/resetarSenha.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Resetar Senha</title>
<link rel="icon" href="imagens/favicon.png">

<!-- jquery - link cdn -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="estilo.css" rel="stylesheet">

<!-- bootstrap - link cdn -->

<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style>
html, body {
	height: 100%;
}

body {
	background:
		url("https://i.pinimg.com/originals/0a/63/0b/0a630be2b073f47d06a784ab085d46b1.jpg");
}
.btn:hover {
	background-color: white;
	color: black;
}
html, p
{
	font-family: "Gotham SSm A","Gotham SSm B","Helvetica Neue",sans-serif !important;
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
	height: 100%;
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
.errormsg {
	padding-top: 1%;
}

.form-control {
	border: 2px solid #bb914a7a;
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
.titulosenha h1
{
	font-size: 30px;
	color: white;
}
.titulosenha
{
	margin-bottom: 1rem;
}
.titulosenha span
{
	color: white;
}
</style>
<body>

		<div class="container containerlogin h-100">

			<div class="row rowlogin h-100">
				<div class="col-6 mx-auto collogin">
					<div class="well box-login">
						<img class="img-fluid" src="images/logo.jpeg" />
						
								<?php
				    if (isset($sucesso))
				        echo '<div style="color:blue;">' . utf8_encode($sucesso) . '</div><br/><br/>';

				    ?>

					<form role="form" action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
							<fieldset>
								<form role="form" action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
									<fieldset>

										<div class="form-group ls-login-user">
											<div class="col text-center titulosenha">
											<h1> Redefinir senha</h1>
											</div>
												<div class="col text-center titulosenha">
												<span> Insira seu email e enviaremos a você um link para voltar a acessar sua conta.</span>
												</div>
											<input class="form-control ls-login-bg-user input-lg" id="userLogin"
												type="text" aria-label="E-mail" name="email"
												placeholder="Insira seu e-mail">
										</div>




										<input type="submit" value="Enviar"
											class="btn btn-primary btn-lg btn-block">


									</fieldset>
								</form>

								<?php
				    if (isset($erro))
				        echo '<div style="color:#F00">' . utf8_encode($erro) . '</div><br/><br/>';

				    ?>

							</fieldset>
						</form>
						<div class="row rowtxtregister">
							<div class="col text-center">
								<span class="txtregister"> Ainda não é membro?<a
									href="cadastro"> Crie sua conta</a>
								</span>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
</body>
</html>
