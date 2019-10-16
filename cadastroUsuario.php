<?php

$i=0;
include 'controle/cadastrarNovoUsuario.php';
if (isset($_POST["a"])) {
    $i = $_POST["a"];
    echo $i;
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Pre Cadastro MT BRASIL</title>
<link rel="icon" href="imagens/favicon.png">
</head>

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


<div class="box-parent-login">
		<div class="well bg-white box-login">
			<h1 class="ls-login-logo">Pre Cadastro MT BRASIL</h1>
			<form role="form" action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
				<fieldset>

					<div class="form-group ls-login-user">
						<label for="userLogin">Nome</label> <input
							class="form-control ls-login-bg-user input-lg" id="nome"
							type="text" aria-label="Nome" name="nome" placeholder="Nome">
					</div>

					<div class="form-group ls-login-user">
						<label for="email">E-MAIL</label> <input
							class="form-control ls-login-bg-password input-lg" id="email"
							type="text" aria-label="E-mail" name="emailUser"
							placeholder="email">
					</div>

					<div class="form-group ls-login-password">
						<label for="userPassword">Senha</label> <input
							class="form-control ls-login-bg-password input-lg"
							id="userPassword" type="password" aria-label="senha"
							name="senhaUser" placeholder="senha">
					</div>

					<div class="form-group ls-login-password">
						<label for="userPassword">Confirmar Senha</label> <input
							class="form-control ls-login-bg-password input-lg"
							id="userPassword2" type="password" aria-label="confirmar senha"
							name="confirmarSenhaUser" placeholder="senha">
					</div>


					<input type="hidden" value="<?php echo $i?>" name="indicacao"> <input
						type="submit" value="Enviar"
						class="btn btn-primary btn-lg btn-block">


				</fieldset>
			</form>
		</div>
	</div>

</body>
</html>
