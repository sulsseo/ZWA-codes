<?php
/**
 * Created by PhpStorm.
 * User: kuba
 * Date: 08/01/2018
 * Time: 22:47
 */

//session_start();
//ob_start();

require_once('php/article_lib.php');
require_once('php/elements_lib.php');

$id_color = 6;
$login = false;

if (check_login()) {
    $id_color = $_SESSION[$_COOKIE['SID']]['color'];
    $login = true;
}

$bg_color = get_bgcolor_class($id_color);
$btn_color = get_btncolor_class($id_color);

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

$navigaton = get_navigation($id_color, $login);

$footer = get_footer($id_color);

?>
<!DOCTYPE html>
<html lang="cs">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Výběžek.eu - zpravodajství ze severu čech</title>

    <!--<link href="css/forms.css" rel="stylesheet" type="text/css">-->
    <link href="css/form.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="page-top">

<!-- Navigation -->
<?php echo $navigaton; ?>

<header class="text-white bg-post">
    <div class="container <?php echo $bg_color; ?> text-left">
        <h1><?php echo get_title($id_article);?></h1>
    </div>
</header>

<section class="padding" id="article">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="pu-4">
                    <p class="pd-3">
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
                            <a href="<?php echo 'article.php?id='.$prev;?>" class="btn <?php echo $btn_color; ?> btn-lg" role="button">Předchozí</a>
                        </div>
                        <div class="col-sm text-right">
                            <a href="<?php echo 'article.php?id='.$next;?>" class="btn <?php echo $btn_color; ?> btn-lg" role="button">Následující</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

