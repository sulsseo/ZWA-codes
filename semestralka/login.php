<?php
/**
 * status 1 - aktivni session
 * status 2 -
 */
require("php/db_lib.php");
ob_start();
session_start();

$user = "";
$info = "";

if (isset($_GET["m"]) && $_GET["m"] == 1) {
    $info = "Registrace proběhla úspěšně";
}


if (!isset($_COOKIE['SID']) && isset($_SESSION[$_COOKIE['SID']])) {
    // have active session for user
    $user_from_session = get_user_by_mail($_SESSION[$_COOKIE['SID']]);
    $status = 1;

} else if (count(array_filter($_POST)) === 2) {
    // no session for this user

    $email = $_POST["email"];
    $password = $_POST["pass"];

    if (check_user($email, $password)) {
        $sid = session_id();
        setcookie('SID', $sid, 0); // TODO expiration

        $_SESSION[$sid]['mail'] = $email;
        $_SESSION[$sid]['settings'] = array();

        header("Location: http://wa.toad.cz/~trmaljak");
        die();
    } else {
        $status = 2;
    }
} else {
    echo 'nikdo tu neni, zalogovat!';
    $status = 3;
}

switch ($status) {
    case 1:
        echo 'nekdo tu uz je lognutej';
        $body = '';
        break;
    case 2:
        echo 'case 2';
        $body =
            '<form class="custom-form" method="POST" action="login.php?m=2">
            <h1>Přihlášení</h1>
            <div class="col-lg-8 mx-auto">
                <img src="images/avatar.png" alt="avatar picture">
            </div>
            <div class="container">Přihlášení bylo neúspěšné, zkuste to znovu</div>
            <div class="col-lg-8 mx-auto">
                <label>Email</label>
                <input id="email" type="email" value="" name="email" require>
        
                <label>Heslo</label>
                <input id="password" type="password" name="pass" require>
        
                <button class="btn btn-primary btn-block" type="submit">Přihlásit</button>
                <a href="registration.php" class="btn btn-info btn-block">Registrovat</a>
            </div>
        </form>';
        break;
    case 3:
        echo 'echo 3';
//        $body =
//            '<form class="custom-form" method="POST" action="login.php?m=2">
//            <h1>Přihlášení</h1>
//            <div class="col-lg-8 mx-auto">
//                <img src="images/avatar.png" alt="avatar picture">
//            </div>
//            <div class="col-lg-8 mx-auto">
//                <label>Email</label>
//                <input id="email" type="email" value="" name="email" require>
//
//                <label>Heslo</label>
//                <input id="password" type="password" name="pass" require>
//
//                <button class="btn btn-primary btn-block" type="submit">Přihlásit</button>
//                <a href="registration.php" class="btn btn-info btn-block">Registrovat</a>
//            </div>
//        </form>';
        break;
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
        <a class="navbar-brand js-scroll-trigger" href="index.php">Výběžek.eu</a>
    </div>
</nav>

<?php print_r($_SESSION);?>
<?php echo $body; ?>

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
