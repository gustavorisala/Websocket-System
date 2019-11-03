<?php
session_start();
require('conexao.php');
if(!empty($_SESSION['id'])){
	echo "Olá ".$_SESSION['nome'].", Bem vindo <br>";
	echo "<a href='sair.php'>Sair</a>";
}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Galeria</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- References: https://github.com/fancyapps/fancyBox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>


    <style type="text/css">
    .gallery
    {
        display: inline-block;
        margin-top: 20px;
    }
    .close-icon{
    border-radius: 50%;
        position: absolute;
        right: 5px;
        top: -10px;
        padding: 5px 8px;
    }
        .form-image-upload{
            background: #e8e8e8 none repeat scroll 0 0;
            padding: 15px;
        }
    </style>
</head>
<body>


<div class="container">


    <h3>Galeria php</h3>
    <form action="imageUpload.php" class="form-image-upload" method="POST" enctype="multipart/form-data">

        <?php if(!empty($_SESSION['error'])){ ?>
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    <li><?php echo $_SESSION['error']; ?></li>
                </ul>
            </div>
        <?php unset($_SESSION['error']); } ?>
        <?php if(!empty($_SESSION['success'])){ ?>
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong><?php echo $_SESSION['success']; ?></strong>
        </div>
        <?php unset($_SESSION['success']); } ?>
        <div class="row">
            <div class="col-md-5">
                <strong>Title:</strong>
                <input type="text" name="nome_foto" class="form-control" placeholder="Title">
            </div>
            <div class="col-md-5">
                <strong>Image:</strong>
                <input type="file" name="nome_arquivo" class="form-control">
            </div>
            <div class="col-md-2">
                <br/>
                <button type="submit" class="btn btn-success">Upload</button>
            </div>
        </div>
    </form>
    <div class="row">
    <div class='list-group gallery'>
            <?php
            $sql = "SELECT * FROM imagens_site";
              $imagens = $conn->query($sql);
              while($nome_arquivo = $imagens->fetch_assoc()){
								$id = $nome_arquivo['id'];
								$images = $nome_arquivo['nome_arquivo']
            ?>
						<div class="col-sm-3">
							<img class="img-responsive" src="uploads/<?php echo $nome_arquivo['nome_arquivo'] ?>">
							<a href="editarfoto.php?id=<?php echo $id ?>">Alterar</a>
						</div>
                <div class="col-sm-4 col-xs-6 col-md-3 col-lg-3 d-none">
                    <a class="thumbnail fancybox" rel="ligthbox" href="uploads/<?php echo $nome_arquivo['nome_arquivo'] ?>">
                        <img class="img-responsive" alt="" src="uploads/<?php echo $nome_arquivo['nome_arquivo'] ?>" />
                        <div class='text-center'>
                        </div> <!-- text-center / end -->
                    </a>
                    <form action="imageDelete.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $nome_arquivo['id'] ?>">
                    <button type="submit" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                    </form>
                </div> <!-- col-6 / end -->
            <?php } ?>


        </div> <!-- list-group / end -->
    </div> <!-- row / end -->
</div> <!-- container / end -->
<form action="textoedit.php" class="form-image-upload" method="POST" enctype="multipart/form-data">

    <?php if(!empty($_SESSION['error'])){ ?>
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                <li><?php echo $_SESSION['error']; ?></li>
            </ul>
        </div>
    <?php unset($_SESSION['error']); } ?>
    <?php if(!empty($_SESSION['success'])){ ?>
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong><?php echo $_SESSION['success']; ?></strong>
    </div>
    <?php unset($_SESSION['success']); } ?>
    <div class="row">
        <div class="col-md-5">
            <strong>Campo de texto:</strong>
            <input type="text" name="texto" class="form-control" placeholder="Texto">
        </div>
        <div class="col-md-2">
            <br/>
            <button type="submit" class="btn btn-success">Upload</button>
        </div>
    </div>
</form>

</body>


<script type="text/javascript">
    $(document).ready(function(){
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>
</html>
