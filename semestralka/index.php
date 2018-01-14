<?php
/**
 *  Main index page
 */

ob_start();

require_once('php/db_lib.php');
require_once('php/elements_lib.php');

$id_color = 6;
$login = false;

if (check_login()) {
    $id_color = $_SESSION[$_COOKIE['SID']]['color'];
    $login = true;
}
$bg_color = get_bgcolor_class($id_color);

$a = 3;
$p = 1;
$max_a = get_article_records();


if (!empty($_GET['a'])) {
    $a = $_GET['a'];
}

if (!empty($_GET['p'])) {
    $p = $_GET['p'];
}


$navigation = get_navigation($id_color, $login);

$footer = get_footer($id_color);

$pagination = get_pagination($a, $p, $max_a, $id_color);

?>
<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Výběžek.eu - zpravodajství ze severu čech</title>

    <link href="css/main.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="page-top">

<!-- Navigation -->
<?php echo $navigation; ?>

<header class="text-dark bg-index">
    <div class="container text-center">
        <h1>Vítejte na zpravodajském webu!</h1>
        <p class="lead">Aktuálně je tento web pouze prázdná prezentace plná nevyužitého potenciálu do budoucna</p>
    </div>
</header>

<?php
for ($i = ($p - 1) * $a + 1; $i <= ($p - 1) * $a + $a; ++$i) {
    if ($i <= $max_a) {
        echo get_jumbotron($i, $id_color);
    }
}
?>

<?php echo $pagination; ?>


<!-- Footer -->
<?php echo $footer ?>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>

</body>
</html>
