<?php
include 'controle/validar_acesso.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
<title>MT BRASIL LOGIN</title>
<link rel="icon" href="imagens/favicon.png">

<!-- jquery - link cdn -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<link href="http://www.copytraderbrasil.com.br/css/backoffice/styleindex.css" rel="stylesheet">


<link rel='stylesheet'
	href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
<!-- bootstrap - link cdn -->

<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
	integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
	crossorigin="anonymous">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<style>
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
</style>
<body>

	<div class="container containerlogin h-100">

		<div class="row rowlogin h-100">
			<div class="col-sm-6 col-12 mx-auto collogin">
				<div class="well box-login">
					<img class="img-fluid" src="images/logo.jpeg" />
				<?php
    if (isset($erro))
        echo '<div class="errormsg" style="color:#F00">' . utf8_encode($erro) . '</div>';

    ?>
				<form role="form" action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
						<fieldset>

							<div class="form-group ls-login-user">
								<label for="userLogin">E-mail</label> <input
									class="form-control ls-login-bg-user input-lg" id="userLogin"
									type="text" aria-label="E-mail" name="usuario"
									placeholder="Insira seu e-mail">
							</div>

							<div class="form-group ls-login-password">
								<label for="userPassword">Senha</label> <input
									class="form-control ls-login-bg-password input-lg"
									id="userPassword" type="password" aria-label="Senha"
									name="senha" placeholder="Insira sua senha">
							</div>



							<input type="submit" value="ENTRAR" class="btn btn-lg btn-block">


						</fieldset>
					</form>
					<div class="row rowtxtregister">
						<div class="col text-center">
							<span class="txtregister"> Ainda não é membro?<a
								href="cadastro"> Crie sua conta</a>
							</span>
						</div>
					</div>
					<div class="row rowtxtregister">
						<div class="col text-center">
							<span class="txtregister"> <a href="resetarSenha.php">Esqueceu a
									senha?</a>
							</span>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</body>
</html>
