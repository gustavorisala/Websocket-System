<?php

$i=0;
include 'controle/cadastrarNovoUsuario.php';
if (isset($_GET["a"])) {
    $i = $_GET["a"];

}
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

<title>Pre Cadastro MT BRASIL</title>
<link rel="icon" href="imagens/favicon.png">
</head>
<style>
html, body
{
  height: 100%;
}
	body
	{
		  background: url("https://i.pinimg.com/originals/0a/63/0b/0a630be2b073f47d06a784ab085d46b1.jpg");
}
html, p
{
	font-family: "Gotham SSm A","Gotham SSm B","Helvetica Neue",sans-serif !important;
}

	.collogin
	{
	    box-shadow: 0 0 100px black;
		background-color: black;
		height: 100%;
	}
	.box-login
	{
    padding-top: 5% !important;
			padding: 15%;
}
/*campos texto */
label
{
	font-size: 18px;
color: white;
}
/* botao enviar*/
.btn
{
	border-color: white;
	font-family: "Gotham SSm A","Gotham SSm B","Helvetica Neue",sans-serif !important;
	font-size: 18px;
	color: white;
	background-color: #bb914a;
}
/* bloco erro*/
.form-control
{
  border: 2px solid #bb914a7a
}
.errormsg
{
padding-top: 1%;
}
.rowtxtregister
{
	padding-top: 2%;
}
.txtregister
{
	font-family: "Gotham SSm A","Gotham SSm B","Helvetica Neue",sans-serif !important;
	font-size: 14px;
	color: white;
}
.btn:hover
{
  background-color: white;
  color: black;
}
</style>
<body>

	<div id="navbar" class="navbar-collapse collapse">
		<ul class="nav navbar-nav navbar-left">
			<li><a href="/">HOME</a></li>
		</ul>
	</div>
	<!--/.nav-collapse -->

<?php


if (isset($erro))
    echo '<div style="color:#F00">' . utf8_encode($erro) . '</div><br/><br/>';
    else if (isset($sucesso))
        echo '<div style="color:#00f">' . utf8_encode($sucesso) . '</div><br/><br/>';

?>


<div class="container containerlogin h-100">
  <div class="row rowlogin h-100">
    <div class="col-6 mx-auto collogin">
    <div class="well box-login">
      <img class="img-fluid" src="images/logo.jpeg" />
			<form role="form" action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
				<fieldset>

					<div class="form-group ls-login-user">
						<label for="userLogin">Nome</label> <input
							class="form-control ls-login-bg-user input-lg" id="nome"
							type="text" aria-label="Nome" name="nome" placeholder="Insira seu nome">
					</div>

					<div class="form-group ls-login-user">
						<label for="email">E-mail</label> <input
							class="form-control ls-login-bg-password input-lg" id="email"
							type="text" aria-label="E-mail" name="emailUser"
							placeholder="Insira seu e-mail">
					</div>
          <div class="row">
					<div class="form-group col ls-login-password">
						<label for="userPassword">Senha</label> <input
							class="form-control ls-login-bg-password input-lg"
							id="userPassword" type="password" aria-label="senha"
							name="senhaUser" placeholder="Insira sua senha">
					</div>

					<div class="form-group col ls-login-password">
						<label for="userPassword">Confirmar Senha</label> <input
							class="form-control ls-login-bg-password input-lg"
							id="userPassword2" type="password" aria-label="confirmar senha"
							name="confirmarSenhaUser" placeholder="Repita sua senha">
					</div>
        </div>


					<input type="hidden" value="<?php echo $i?>" name="indicacao"> <input
						type="submit" value="CONTINUAR"
						class="btn btn-primary btn-lg btn-block">


				</fieldset>
			</form>
		</div>
  </div>
</div>
	</div>

</body>
</html>
