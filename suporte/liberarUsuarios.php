<?php
session_start();

if (! isset($_SESSION['usuario'])) {
    header('Location: index.php');
} else {
    if ($_SESSION['papel'] != "admin" && $_SESSION['papel'] != "suporte") {
        echo "<h1>Somente ADM<h1>";
    } else {
        require_once '../controle/liberarUsuario.php';
        ?>

<!doctype html>
<html lang="pt-br">
<head>

<title>Gerenciar Usuarios ADMIN</title>
<link rel="icon" href="../imagens/favicon.png">
<!-- jquery - link cdn -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="http://www.copytraderbrasil.com.br/css/backoffice/suporte.css">
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script
	src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


<!--  link href="../estilo2.css" rel="stylesheet"-->

</head>

<body>

    <style>
    .formdados
    {
    	border: 0px;
    }
    body
    {
    	background: unset !important;
    }
    #conteudo
    {
      background-size: cover;
      background-image: url(../images/2.jpeg);
    }
    .sidebar li
    {
        position: relative;
    	font-size: 16px;
    }
    .sidebar img
    {
    	width: 15%;
    	position: relative;
    }
    .centralizar
    {
      display: flex;
      justify-content: center;
      align-items: center;
    }
  #createiq
  {
      background-size: cover;
      background-image: url(../images/3.jpeg);
    }
    footer
    {
      position: relative;
      bottom: 0;
      left: 0;
    }

  .bootstrap-select > .dropdown-toggle
  {
    font-weight: bold;
    padding: 4%;
    height: 3.3rem;
  }
  .input-group-prepend {
      margin-right: -1px;
      z-index: 9999999;
  }
  .input-group-text
  {
    font-weight: bold;
  }
  .createtitulo
  {
    display: flex;
      justify-content: center;
      align-items: center;
    background-color: #e9ecef;
    padding: 3%;
    border-color: transparent !important;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
  }
  #blococriar
  {
    background-color: white;
    padding-top: 1rem;
    padding-bottom: 1rem;
    padding-left: 5rem;
    padding-right: 5rem;
    border: 1rem solid #e9ecef;
  }
  #blocolembrete ol h1
  {
    background-color: black;
    color:white;
    text-align: center;
  }
  #blocolembrete li
  {
    padding: 2%;
    background-color: #49505724;
  }
  .padding
  {
    padding-top: 3rem;
    padding-bottom: 3rem;
  }
  .btn
  {
    font-size: 16px;
    font-weight: 500;
  padding: 2%;
  border-radius: 5px;
  border-color: white;
  font-family: "Gotham SSm A","Gotham SSm B","Helvetica Neue",sans-serif !important;
  color: black;
  background-color: #e9ecef;
  }
  .imguteis img
  {
    width: 10%;
    margin: 3%;
  }
  @media (max-width:767px) {
    #blococriar
    {
      padding: 1rem;
    }
    .btn
    {
      width: 15rem;
      padding: 1rem;
    }
    #blocolembrete ol
    {
      padding-left: 0px;
    }
    .bootstrap-select
    {
      margin-bottom: 1rem;
    }
    .input-group-prepend
    {
      margin-left: auto;
      margin-right: auto;
    }
  }
  </style>
  	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  		<button id="navtoggle" class="navbar-toggler" type="button" data-toggle="collapse"
  			data-target="#conteudoNavbarSuportado"
  			aria-controls="conteudoNavbarSuportado" aria-expanded="false"
  			aria-label="Alterna navegação">
  			<span class="navbar-toggler-icon"></span>
  		</button>

  		<div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
  			<ul class="navbar-nav mr-auto">
  				<a class="navbar-brand" href="#"> <img class="ml-4 logotipo"
  					src="../images/logosemfundo.png" alt="">
          </div>
  				</a>
          <a href="../sair.php">Sair</a>
  			</ul>
  	  </div>
  	</nav>
  	<div class="container-fluid">
  		<div class="row headerdados">
  			<div class="col text-center">
  				<h1>Painel Suporte</h1>
  			</div>
  		</div>
		</div>
    <div id="conteudo" class="container-fluid">
  		<div class="row">
  			<div class="col">
	<div class="container-fluid">
<div class="row padding">
  <div class="col-12 col-sm-6 mx-auto">
    <div class="col col-sm-11 mx-auto">
<?php

        if (isset($erro))
            echo '<div style="color:#F00">' . utf8_encode($erro) . '</div><br/><br/>';
        else if (isset($sucesso))
            echo '<div style="color:#00f">' . utf8_encode($sucesso) . '</div><br/><br/>';

        ?>
		<form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon3">Contas Pré Cadastro</span>
					</div>
					<select class="selectpicker pl-0 col-12 col-sm-6 pr-0" data-live-search="true" name="email">

<?php
        if ($dadosUsuariosPre) {
            while ($row = mysqli_fetch_array($dadosUsuariosPre)) {
                echo "<option value=\"" . $row['email'] . "\">" . $row['email'] . "</option>";
            }
        }
        ?>
      </select>
      <input class="ml-4 btn" type='submit' value='Selecionar'>
				</div>
    </div>
  </div>
</div>
  </div>
				<div class="row padding">
          <div id="blocolembrete" class="col-12 col-sm-4 centralizar">
                <ol><h1>Lembrar-se</h1>
            		<li>Cadastrar usuário na IQ Option</li>
              		<li>Confirmar pagamento da licença de 90 dias</li>
            		<li>Liberar o usuario no backoffice</li>
            		<li>Enviar link do programa MT BRASIL</li>
            		<li>Enviar informações por e-mail</li>
              </ol>
              </div>
      				<div id="createiq" class="col-12 col-sm-4">
				<?php if(isset($dadosUser)){?>
          <div class="row createtitulo">
				<h1>Criar Conta na IQ Option</h1>
      </div>
      <div id="blococriar" class="row">
        <div class="col">
					<h4>Nome: <?=$dadosUser["nome"]?></h4>
					<h4>Email: <?=$dadosUser["email"]?></h4>
					<h4>Senha: <?=$senhaTemp?></h4>
          <div class="row mt-3 mb-3">
            <div class="col mx-auto">
              <div class="row">
                <div class="col">
					<input type="checkbox" value="contaIQ" name="contaIQ"> Confirmar Conta IQ Criada
        </div>
        </div>
        <div class="row">
            <div class="col">
					<input type="checkbox" value="pagamento" name="pagamento"> Confirmar Pagamento Assinatura
        </div>
        </div>
        </div>
      </div>
        <div class="row">
          <div class="col">
				<input type="hidden" name="adm" value="<?=$_SESSION['id_usuario']?>">
				<input type='submit' class="btn p-3" value='Liberar Usuário'>
      </div>
    </div>
      </div>
      </div>
      </div>
      <div class="col">
        <div class="row">
          <div class="col text-center">
            <h1>Links Úteis</h1>
          </div>
        </div>
          <div class="row imguteis">
            <div class="col text-center">
              <a rel="noopener noreferrer" target="_blank" href="https://webmail-seguro.com.br/copytraderbrasil.com.br/"><img class="img-fluid" src="../images/email.svg"></a>
                <a rel="noopener noreferrer" target="_blank" href="https://dashboard.tawk.to/login?lang=pt_br"><img class="img-fluid" src="../images/callcenter.svg"></a>
              </div>
          </div>
      </div>
            </div>

          <?php }  ?>
        </form>
	</div>
</div>
</div>

	<!-- Footer -->
	<footer class="page-footer font-small special-color-dark pt-4">

		<!-- Footer Elements -->
		<!-- Footer Elements -->

		<!-- Copyright -->
		<div class="footer-copyright text-center py-3">
			© 2019 Copyright <a href="#"> MTBrasil</a>
		</div>
		<!-- Copyright -->

	</footer>
	<!-- Footer -->
	<script>
			new ClipboardJS('.btn');
			</script>

		<script>
		$("#navtoggle").click(function(){
		  $("#conteudoNavbarSuportado").toggle();
		});
		</script>

</body>
</html>
<?php
    }
}
?>
