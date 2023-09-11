<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilos.css">
    <!--BOOTSTRAP LINK-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--FONT AWOSOME LINK-->
    <script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>   
    <meta name="viewport" content="width=device-width, initial-scale=1">    
</head>
<body>
    <div class="container-fluid text-center" style="margin-top: 20px;">
        <img src="img/logo.jpg" style="width: 100px;">
    </div>

    <div class="container py-5" style="margin-top: 10px;">
        <ul class="nav nav-justified py-2 nav-pills">
            <?php
            if (isset($_GET["pagina"])) : ?>
                <?php if ($_GET["pagina"] == "registro") : ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?pagina=registro">Registro</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?pagina=registro">Registro</a>
                    </li>
                <?php endif ?>

                <?php if ($_GET["pagina"] == "ingreso") : ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?pagina=ingreso">Ingreso</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?pagina=ingreso">Ingreso</a>
                    </li>
                <?php endif ?>

                <?php if ($_GET["pagina"] == "inicio") : ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?pagina=inicio">Inicio</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link " href="index.php?pagina=inicio">Inicio</a>
                    </li>
                <?php endif ?>

                <?php if ($_GET["pagina"] == "salir") : ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?pagina=salir">Salir</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?pagina=salir">Salir</a>
                    </li>
                <?php endif ?>
            <?php endif ?>
        </ul>
    </div>

    <div class="container-fluid">
        <div class="container py-5">
            <?php 
                if (isset($_GET["pagina"])) {
                    if ($_GET["pagina"]== "registro" ||
                    $_GET["pagina"]== "ingreso" ||
                    $_GET["pagina"]== "inicio" ||
                    $_GET["pagina"]== "registrar_producto" ||
                    $_GET["pagina"]== "editar" ||
                    $_GET["pagina"]== "salir") {
                        include "paginas/".$_GET["pagina"].".php";
                    } else {
                        include "paginas/error404.php";
                    } 
                } else {
                    include "paginas/inicio.php";
                }
            ?>
        </div>
    </div>
</body>
</html>