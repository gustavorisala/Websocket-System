<?php
include 'controle/redefinirSenha.php';
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

<body>

<?php

if (isset($sucesso)) {
    echo "<p>".$sucesso."</p><br><a target='_blank' href='http://localhost/painel'>Fazer Login</a>";
} else {
    if ($email == null) {
        echo "<p>Token invalido!!!</p>";
    } else {
        ?>


	<div align="center">
		<div class="box-parent-login" style="width: 80%">
			<div class="well bg-white box-login">
				<h1 class="ls-login-logo">Resetar Senha</h1>
				<form role="form" action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
					<fieldset>
						<p><?=$email ?></p>
						<input type="hidden" name="token" value="<?=$token ?>">
						<input type="hidden" name="email" value="<?=$email ?>">
						<div class="form-group ls-login-user">
							<label for="senha1">Senha</label> <input
								class="form-control ls-login-bg-user input-lg" id="senha1"
								type="password" aria-label="Senha" name="senha1"
								placeholder="Senha">
						</div>

						<div class="form-group ls-login-user">
							<label for="senha2">Confirmação da Senha</label> <input
								class="form-control ls-login-bg-user input-lg" id="senha2"
								type="password" aria-label="Senha" name="senha2"
								placeholder="Senha">
						</div>




						<input type="submit" value="Criar"
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
	<?php } }?>
</body>
</html>
