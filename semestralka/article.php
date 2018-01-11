<?php
/**
 * Created by PhpStorm.
 * User: kuba
 * Date: 08/01/2018
 * Time: 22:47
 */

require('php/article_lib.php');
//require('php/db_lib.php');

$records = get_article_records();

if (isset($_GET['id']) && $_GET['id'] > 1 && $_GET['id'] < $records) {
    $id_article = $_GET['id'];
    $prev = $id_article-1;
    $next = $id_article+1;
} elseif($_GET['id'] == $records){
    $id_article = $_GET['id'];
    $prev = $records-1;
    $next = 1;
} else {
    $id_article = 1;
    $prev = $records;
    $next = 2;
}
?>
<!DOCTYPE html>
<html lang="cs">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Vybezek.eu - zpravodajsky web</title>

    <!--<link href="css/forms.css" rel="stylesheet" type="text/css">-->
    <link href="css/form.css" rel="stylesheet">
    <link href="css/extension.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">

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
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="example.php">Example</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="bg-primary text-white bg-post">
    <div class="container bg-primary text-left">
        <h1><?php echo get_title($id_article);?></h1>
<!--        <p class="lead">A landing page template freshly redesigned for Bootstrap 4</p>-->
    </div>
</header>

<section class="padding" id="article">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
<!--                <img src="images/title.jpg" class="img-responsive img-fluid p-3">-->
                <div class="pu-4">
                    <p class="pd-3">
<!--                    <h1>--><?php //echo get_title($id_article); ?><!--<br></h1>-->
                    </p>
                    <p class="lead h3 pb-3 pt-3">
                        <?php echo get_perex($id_article); ?>
                    </p>
                    <p>
                        <?php echo get_body2($id_article); ?>
                    </p>
                </div>
                <div class="container p-3">
                    <div class="row">
                        <div class="col-sm">
                            <a href="<?php echo 'article.php?id='.$prev;?>" class="btn btn-primary btn-lg" role="button">Předchozí</a>
                        </div>
                        <div class="col-sm text-right">
                            <a href="<?php echo 'article.php?id='.$next;?>" class="btn btn-primary btn-lg" role="button">Následující</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

