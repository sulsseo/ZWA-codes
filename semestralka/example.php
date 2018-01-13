<?php
session_start();
ob_start();

require("php/article_lib.php");
?>
<!DOCTYPE html>
<html lang="cs">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Vybezek.eu - sport</title>

    <!--<link href="css/forms.css" rel="stylesheet" type="text/css">-->
    <link href="css/form.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
<!--    <link href="css/scrolling-nav.css" rel="stylesheet">-->

</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Výběžek.eu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="registration.php">Registration</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="bg-primary text-white bg-image">
    <div class="container text-center">
        <h1>Vítejte!</h1>
        <p class="lead">A landing page template freshly redesigned for Bootstrap 4</p>
    </div>
</header>

<?php echo get_jumbotron(2); ?>
<?php echo get_jumbotron(3); ?>

<section id="jumbotron">
    <div class="container jumbotron bg-light">
        <picture>
            <source srcset="images/title.jpg" type="image/jpg" />
            <img src="images/title.jpg" class="img-fluid" alt="titulni obrazek" />
        </picture>
        <h4 class="display-4">Titulek</h4>
        <p class="lead">odstavec</p>
        <hr class="my-4">
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="#" role="button">Číst</a>
        </p>
    </div>
</section>

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>

</body>

</html>
