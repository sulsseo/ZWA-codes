<?php
require("php/db_lib.php");
$firstname = "";
$user = "";

// ob_start();

// function kontrola($user) {
//     echo "kontrola: ".$user;
//     print_r(get_user($user));
//     if ($user == "kuba@trmal") {
//         return true;
//     } else {
//         return false;
//     }
// }

// predvyplnovani formulare pokud byl uz nekdy vyplneny
// v action vola sebe sama

print_r($_POST);

// if (isset($_POST["user"])) {
//     $user = $_POST["user"];
    
//     if (kontrola($user)) {
//     //     // ulozeni do DB
//     //     // metodou get se presmeruje na jinou stranku - viz PRG
//         // header("HTTP/1.1 303 See Other");
//         header("Location: http://wa.toad.cz/~trmaljak");
//         die();
//     }
// }
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
        <h2>New User</h2>
        <div class="container">
            <img src="images/avatar.png" alt="avatar picture">
        </div>
        <div class="container">
            <label>Jmeno</label>
            <input id="firstname" type="text" name="firstname" value="<?php echo htmlspecialchars($user)?>">

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

</body>

</html>