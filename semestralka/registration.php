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
        <meta charset="UTF-8">
        <title>Registration page</title>

        <link href="css/main.css" rel="stylesheet" type="text/css">
        <link href="css/forms.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <nav>
            <ul class="horizontal-nav">
                <li class="nav-item">
                    <a href="index.html">Home</a>
                </li>
            </ul>
        </nav>
        <form class="registration-form" method="POST" action="registration.php">
            <h2>Novy uzivatel</h2>
            <div class="container">
                <img src="images/avatar.png" alt="avatar picture">
            </div>
            <div class="container">
                <?php echo htmlspecialchars($info)?>
                <label>Jmeno</label>
                <input id="firstname" type="text" name="firstname" value="<?php echo htmlspecialchars($firstname)?>">

                <label>Email</label>
                <input id="email" type="email" name="user" value="<?php echo htmlspecialchars($user)?>">

                <label>Heslo</label>
                <input id="password" type="password" name="pass">

                <label>Potvrdit heslo</label>
                <input id="password2" type="password" name="pass2">

                <button type="submit">Registrovat</button>
            </div>
        </form>


        <!-- scripts section -->
        <script src="js/registrationForm.js"></script>
        <!-- <script src="js/tempAlert.js"></script> -->

    </body>

    </html>