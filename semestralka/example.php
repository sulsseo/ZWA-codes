<?php

ob_start();

require_once('php/db_lib.php');

$id_color = 6;
$login = false;

if (check_login()) {
    $id_color = $_SESSION[$_COOKIE['SID']]['color'];
    $login = true;
}

require_once("php/elements_lib.php");

$navigation = get_navigation($id_color, $login);

$footer = get_footer($id_color);

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
</head>

<body id="page-top">

<!-- Navigation -->
<?php echo $navigation; ?>

<header class="bg-primary text-white bg-image">
    <div class="container text-center">
        <h1>SPORT</h1>
        <p class="lead">Vzor rubriky o sportu.</p>
    </div>
</header>

<?php echo get_jumbotron(2, $id_color); ?>
<?php echo get_jumbotron(3, $id_color); ?>

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
            <a class="btn <?php echo get_btncolor_class($id_color); ?> btn-lg" href="#" role="button">Číst</a>
        </p>
    </div>
</section>

<!-- Footer -->
<?php echo $footer; ?>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>

</body>

</html>
