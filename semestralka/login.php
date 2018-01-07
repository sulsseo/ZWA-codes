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
    <meta charset="UTF-8">
    <title>Login page</title>

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
    <form class="login-form" method="POST" action="login.php?m=2">
        <h1>Přihlášení</h1>
        <div class="container">
            <img src="images/avatar.png" alt="avatar picture">
        </div>
        <?php echo htmlspecialchars($info)?>
        <div class="container">
            <label>Email</label>
            <input id="email" type="email" value="<?php echo htmlspecialchars($user)?>" name="email">

            <label>Heslo</label>
            <input id="password" type="password" name="pass">

            <button type="submit">Přihlásit</button>
        </div>
    </form>


    <!-- scripts section -->
    <script src="js/loginForm.js"></script>

</body>

</html>