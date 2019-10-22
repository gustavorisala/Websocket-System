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

<script src="../js/clipboard.min.js"></script>
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<link href="../css/cadastro.css" rel="stylesheet">


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
		url("../images/background.jpg");
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
.bg-wizard
{
	background-color: black;
}
</style>
<body>

	<div id="navbar" class="navbar-collapse collapse">
		<ul class="nav navbar-nav navbar-left">
			<li><a href="/">HOME</a></li>
		</ul>
	</div>
	<!--/.nav-collapse -->
<style>

</style>
	<div class="container containerlogin h-100">
		<div class="row rowlogin h-100">
			<div class="col-6 mx-auto collogin">
				<div class="row">
				<div class="well col-6 box-login mx-auto text-center">
					<a href="/"><img class="img-fluid" src="../images/logo.jpeg" /></a>
				</div>
			</div>
			<div class="row">
				<div class="col bg-wizard">
					<div class="form-wizard">
						<div class="row">
  <div class="steps col">
    <ul>
      <li>
        <span>1</span>
        Cadastro
      </li>
			<!--
      <li class="d-none">
        <span>2</span>
        Pagamento
      </li>
		-->
      <li>
        <span>2</span>
        Confirmação
      </li>
        <li>
        <span>3</span>
        Conclusão
      </li>
    </ul>
  </div>
	</div>
  <div class="myContainer">
    <div class="form-container animated">
      <h2 class="text-center form-title">Provedor: Kleyton Alves</h2>
      <form>
        <div class="form-group">
          <div class="blocoafiliadoiq row">
						<div class="metodo col">
							<img src="../images/iqoption.gif">
						</div>

								<div class="rentabilidade col">
									<span>1% - 3% /Dia</span>
								</div>
										<div class="investimento col">
											<span>
											$500 - $1000
										</span>
										</div>
										<div class="selecionar col">
											<a href="https://affiliate.iqoption.com/redir/?aff=124319" rel="noopener noreferrer" target="_blank" id="selectiq" class="escolher" >SELECIONAR</a>
										</div>
					</div>
					<div class="blocoafiliadoalpari row">
						<div class="metodo col">
							<img src="../images/alpari.png">
						</div>
								<div class="rentabilidade col">
									<span>1% - 3% /Dia</span>
								</div>
										<div class="investimento col">
											<span>
										 	$1000 - $3000
										</span>
										</div>
										<div class="selecionar col">
											<button disabled class="escolheralpari">EM BREVE</button>
										</div>
					</div>
        </div>
        <div class="form-group text-center mar-b-0">
          <input type="button" value="PRÓXIMO" class="btn next">
        </div>
      </form>
    </div>

		<!-- PAGAMENTO
    <div class="form-container animated">
      <h2 class="text-center form-title">Formas de pagamento</h2>
      <form>
        <div class="form-group">
					<div class="row">
						<div class="col logotipo">
					<img src="../images/neteller.svg">
				</div>
				</div>
					<div class="container">
					<div class="row">
						<div class="col">
						<span class="txtpay">Enviar pagamento para:</span>
					</div>
					</div>
					<div class="row boxemail">
						<div class="col d-flex centralizar">
          <input type="text" id="link" class="caixacopy" value="niltonrochaengenharia@gmail.com">
					<input id="copybtn" type="button" data-clipboard-target="#link" value="Copiar">
					</div>
				</div>
					</div>
				</div>
		        <div class="form-group text-center mar-b-0">
		          <input type="button" value="PRÓXIMO" class="btn next">
		        </div>
      </form>
    </div>
		-->
		<div class="form-container animated container-fluid">
      <h2 class="text-center form-title">Confirme seu e-mail</h2>
      <form action="../envia.php">
        <div class="form-group">
        <div class="container">
					<div class="row">
					  <div class="col">
							<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">@</span>
  </div>
  <input type="text" class="form-control" placeholder="Insira seu e-mail IQ Option" aria-label="Username" aria-describedby="basic-addon1">
</div>
					  </div>
					</div>
				</div>
        </div>
        <div class="form-group text-center mar-b-0">
          <input type="submit" formtarget="_blank" value="PRÓXIMO" class="btn next">
        </div>
      </form>
    </div>
    <div class="form-container animated container-fluid">
      <h2 class="text-center form-title">Concluído</h2>
      <form>
        <div class="form-group">
          <h3 class="text-center">Você está a um passo de receber as operações</h3>
          <p class="text-center">Lançamento marcado para o dia <br><b>04/11/2019</b></p>
        </div>
      </form>
    </div>
  </div>
</div>
				</div>
				</div>
				</div>
			</div>
		</div>
	</div>
<script>
var totalSteps = $(".steps li").length;

$(".submit").on("click", function(){
  return false;
});

$(".steps li:nth-of-type(1)").addClass("active");
$(".myContainer .form-container:nth-of-type(1)").addClass("active");

$(".form-container").on("click", ".next", function() {
  $(".steps li").eq($(this).parents(".form-container").index() + 1).addClass("active");
  $(this).parents(".form-container").removeClass("active").next().addClass("active flipInX");
});

$(".form-container").on("click", ".back", function() {
  $(".steps li").eq($(this).parents(".form-container").index() - totalSteps).removeClass("active");
  $(this).parents(".form-container").removeClass("active flipInX").prev().addClass("active flipInY");
});
</script>

<script>
new ClipboardJS('#copybtn');
</script>
</body>
</html>
