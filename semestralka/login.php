<?php
require("php/db_lib.php");
ob_start();

$user = "";
$info="";

if (isset($_GET["m"]) && $_GET["m"]==1) {
    $info = "Registrace proběhla úspěšně";
}

function check($email, $password) {
    $user_record = get_user($email);
    // print_r($user_record);

    if (is_array($user_record)) {
        echo "1";
        if (isset($user_record["email"]) && $user_record["email"] == $email) {
            echo "2";
            if (password_verify($password.$email, $user_record["password"])) {
                echo "3";
                return true;
            } else return false;
        } else return false;
    } else {
        false;
    }
    
}

// predvyplnovani formulare pokud byl uz nekdy vyplneny
// v action vola sebe sama

// $errorJmeno = ""; // datove promenne
if (count(array_filter($_POST)) === 2) {
    $email = $_POST["email"];
    $password = $_POST["pass"];

    if (check($email, $password)) {
    //     // ulozeni do DB
    //     // metodou get se presmeruje na jinou stranku - viz PRG
        // header("HTTP/1.1 303 See Other");
        header("Location: http://wa.toad.cz/~trmaljak");
        die();
    } else {
        if (isset($_GET["m"]) && $_GET["m"]==2) {
            $info = "Přihlášení bylo neúspěšné, zkuste to znovu";
        }
    }
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
    <link href="css/zwa.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.html">Výběžek.eu</a>
    </div>
</nav>

<!-- <section id="login"> -->
    <form class="custom-form" method="POST" action="login.php?m=2">
        <h1>Přihlášení</h1>
        <div class="col-lg-8 mx-auto">
        <img src="images/avatar.png" alt="avatar picture">
        </div>
        <div class="container">
            <?php echo htmlspecialchars($info)?>
        </div>
        <div class="col-lg-8 mx-auto">
            <label>Email</label>
            <input id="email" type="email" value="" name="email" require>

            <label>Heslo</label>
            <input id="password" type="password" name="pass" require>

            <button class="btn btn-primary btn-block" type="submit">Přihlásit</button>
            <a href="registration.php" class="btn btn-info btn-block">Registrovat</a>
        </div>
    </form>
<!-- </section> -->

<!-- scripts section -->
<script src="js/loginForm.js"></script>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>

</body>

</html>
