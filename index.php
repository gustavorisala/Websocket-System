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

<body>


	<div align="center">
		<div class="box-parent-login" style="width: 80%">
			<div class="well bg-white box-login">
				<h1 class="ls-login-logo">MT BRASIL</h1>
				<form role="form" action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
					<fieldset>

						<div class="form-group ls-login-user">
							<label for="userLogin">E-mail</label> <input
								class="form-control ls-login-bg-user input-lg" id="userLogin"
								type="text" aria-label="E-mail" name="usuario"
								placeholder="E-mail">
						</div>

						<div class="form-group ls-login-password">
							<label for="userPassword">Senha</label> <input
								class="form-control ls-login-bg-password input-lg"
								id="userPassword" type="password" aria-label="Senha"
								name="senha" placeholder="Senha">
						</div>

						<div>
							<a href="resetarSenha.php">Resetar Senha</a><br><br>
						</div>

						<input type="submit" value="Entrar"
							class="btn btn-primary btn-lg btn-block">


					</fieldset>
				</form>
				
				<?php
    if (isset($erro))
        echo '<div style="color:#F00">' . utf8_encode($erro) . '</div><br/><br/>';

    ?>
			</div>
		</div>
	</div>
</body>
</html>
