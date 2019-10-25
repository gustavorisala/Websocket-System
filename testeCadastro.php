<?php
$i = 0;

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

<title>MT BRASIL</title>
<link rel="icon" href="imagens/favicon.png">

<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="estilo.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>


<?php
echo date("Y-m-d 00:00:00" , strtotime('90 days'));
?>

	<!-- INICIO DO BOTAO PAGSEGURO -->
	<a href="javascript:void(0)"
		onclick="PagSeguroLightbox('9CCB2EA7DBDB719EE45A7FB94E76D128'); return false;"><img
		src="//assets.pagseguro.com.br/ps-integration-assets/botoes/pagamentos/95x45-pagar.gif"
		alt="Pague com PagSeguro - é rápido, grátis e seguro!" /></a>
	<script type="text/javascript"
		src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
	<!-- FIM DO BOTAO PAGSEGURO -->

	<form action="https://app.copytraderbrasil.com.br/cadastroUsuario.php"
		method="POST">
		<input type="hidden" value="<?=$i?>" name="a"> <input type="submit"
			value="Cadastre-se">
	</form>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>