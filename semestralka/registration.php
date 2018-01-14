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
 *
 * @param $user plain text user from form
 * @param $password plain text pass from form
 * @return string with response
 */
function check($user, $password)
{
    if (is_array(get_user_by_mail($user))) {
        return 'Email je již obsazen.';
    } else {
        if (strlen($password) < 8) {
            return 'Heslo musí být aspoň 8 znaků dlouhé.';
        } else return '';
    }
}

if (count(array_filter($_POST)) === 4) {
    $user = $_POST["user"];
    $firstname = $_POST["firstname"];
    $password = $_POST["pass"];

    $info = check($user, $password);

    if (empty($info)) {
        add_user($firstname, $user, $password);

        header("Location: login.php?m=1");
        die();
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

    <title>Výběžek.eu - zpravodajství ze severu čech</title>


    <link href="css/form.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">Výběžek.eu</a>
    </div>
</nav>

<form class="custom-form" method="POST" action="registration.php">
    <h1>Registrace</h1>
    <div class="col-lg-8 mx-auto">
        <img src="images/avatar.png" alt="avatar picture">
    </div>
    <div class="container">
        <?php echo htmlspecialchars($info) ?>
    </div>
    <div class="col-lg-8 mx-auto">
        <label for="firstname">Jmeno *</label>
        <input id="firstname" type="text" name="firstname" value="<?php echo htmlspecialchars($firstname) ?>" required>

        <label for="email">Email *</label>
        <input id="email" type="email" name="user" value="<?php echo htmlspecialchars($user) ?>" required>

        <label for="password">Heslo *</label>
        <input id="password" type="password" name="pass" required>

        <label for="password2">Potvrdit heslo *</label>
        <input id="password2" type="password" name="pass2" required>

        <div class="container">
            <p>heslo musí být alespoň 8 znaků dlouhé</p>
            <p>položky označené * jsou povinné</p>
        </div>

        <button class="btn btn-primary btn-block" type="submit">Registrovat</button>
    </div>
</form>


<!-- scripts section -->
<script src="js/registrationForm.js"></script>

</body>

</html>