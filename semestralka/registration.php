<?php
require("php/db_lib.php");
$firstname = "";
$user = "";
$info = "";

ob_start();

/**
 * check if user exist
 * 
 * Return:  true - no record, we can add user
 *          false - we have record, select new one
 */
function check($user) {
    if (is_array(get_user($user))) {
        return false;
    } else {
        return true;
    }
}

if (count(array_filter($_POST)) === 4) {
    $user = $_POST["user"];
    $firstname = $_POST["firstname"];
    $password = $_POST["pass"];

    if (check($user)) {
        add_user($firstname,$user,$password);

        header("Location: login.php?m=1");
        die();
    } else {
        $info = "<h3>Email je již obsazený</h3>";
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

    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="index.html">Výběžek.eu</a>
        </div>
    </nav>

    <form class="custom-form" method="POST" action="registration.php">
        <h1>Registrace</h1>
        <div class="col-lg-8 mx-auto">
            <img src="images/avatar.png" alt="avatar picture">
        </div>
        <div class="container">
            <?php echo htmlspecialchars($info)?>
        </div>
        <div class="col-lg-8 mx-auto">
            <label>Jmeno</label>
            <input id="firstname" type="text" name="firstname" value="<?php echo htmlspecialchars($firstname)?>" require>

            <label>Email</label>
            <input id="email" type="email" name="user" value="<?php echo htmlspecialchars($user)?>" require>

            <label>Heslo</label>
            <input id="password" type="password" name="pass" require>

            <label>Potvrdit heslo</label>
            <input id="password2" type="password" name="pass2" require>

            <button class="btn btn-primary btn-block" type="submit">Registrovat</button>
            <!-- <a href="registration.php" class="btn btn-info btn-block">Registrovat</a> -->
        </div>
    </form>


    <!-- scripts section -->
    <script src="js/registrationForm.js"></script>

    </body>

    </html>