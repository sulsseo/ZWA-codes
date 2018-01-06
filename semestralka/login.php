<?php
ob_start();

function kontrola($user) {
    echo "kontrola: ".$user;
    if ($user == "kuba@trmal") {
        return true;
    } else {
        return false;
    }
}
// predvyplnovani formulare pokud byl uz nekdy vyplneny
// v action vola sebe sama
$user = "";
$errorJmeno = ""; // datove promenne
if (isset($_POST["user"])) {
    $user = $_POST["user"];
    $errorJmeno = "spatne vyplneno";
    if (kontrola($user)) {
    //     // ulozeni do DB
    //     // metodou get se presmeruje na jinou stranku - viz PRG
        // header("HTTP/1.1 303 See Other");
        header("Location: http://wa.toad.cz/~trmaljak");
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <title>Login page</title>

    <link href="css/main.css" rel="stylesheet" type="text/css">
    <link href="css/forms.css" rel="stylesheet" type="text/css">
</head>

<body>
    <form class="login-form" method="POST" action="login.php">
        <div class="container">
            <img src="images/avatar.png" alt="avatar picture">
        </div>
        <div class="container">
            <label>Email</label>
            <input id="email" type="email" name="user" value="<?php echo htmlspecialchars($user)?>">

            <label>Heslo</label>
            <input id="password" type="password" name="pass">

            <button type="submit">Přihlásit</button>
        </div>
    </form>


    <!-- scripts section -->
    <script src="js/loginForm.js"></script>

</body>

</html>