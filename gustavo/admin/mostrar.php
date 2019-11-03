<?php
  session_start();
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



    <div class="row">
    <div class='list-group gallery'>


            <?php
            require('db_config.php');

            $sql = "SELECT * FROM image_gallery";
              $images = $mysqli->query($sql);


              while($image = $images->fetch_assoc()){

            ?>
                <div class='col teste'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="/php/uploads/<?php echo $image['id'] ?>">
                        <img class="img-responsive" alt="" src="/php/uploads/<?php echo $image['image'] ?>" />
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $image['title'] ?></small>
                        </div> <!-- text-center / end -->
                    </a>
                </div> <!-- col-6 / end -->
            <?php } ?>


        </div> <!-- list-group / end -->
    </div> <!-- row / end -->
</div> <!-- container / end -->
<div class="row">

<div class='col'>


        <?php
        $sql = "SELECT * FROM text";
          $textos = $mysqli->query($sql);


          while($texto = $textos ->fetch_assoc()){

        ?>
            <div class='col teste'>
                    <div class='text-center'>
                        <span class='text-muted'><?php echo $texto['texto'] ?></span>
                    </div> <!-- text-center / end -->
              </div> <!-- col-6 / end -->
        <?php } ?>


      </div>
    </div> <!-- list-group / end -->
</body>

<style>
.teste img
{
  height:  200px;
}
</style>
<script type="text/javascript">
    $(document).ready(function(){
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>
</html>
