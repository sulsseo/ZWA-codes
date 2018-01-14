<?php
/**
 * Profile html page
 *
 * User: kuba
 * Date: 12/01/2018
 * Time: 18:24
 */

require_once("php/db_lib.php");
require_once('php/elements_lib.php');

ob_start();
session_start();

if (!empty($_GET['color'])) {
    $_SESSION[$_COOKIE['SID']]['color'] = $_GET['color'];
}

$email = $_SESSION[$_COOKIE['SID']]['mail'];
$color = get_bgcolor_class($_SESSION[$_COOKIE['SID']]['color']);

switch ($color) {
    case 'bg-dark':
        $color = 'tmavě šedá'; // by default - dark grey
        break;
    case 'bg-primary':
        $color = 'modrá'; // blue
        break;
    case 'bg-secondary':
        $color = 'světle šedá'; // light grey
        break;
    case 'bg-success':
        $color = 'zelená'; // light green
        break;
    case 'bg-warning':
        $color = 'žlutá'; // yellow
        break;
    case 'bg-danger':
        $color = 'červená'; // red
        break;
    default:
        $color = 'none';
        break;
}

$user = get_user_by_mail($email);

$name = $user['name'];

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


<header>
    <div class="text-center col-lg-8 mx-auto">
        <img src="images/avatar.png" alt="avatar picture">
    </div>
</header>

<section>
    <!--    <div class="col-lg-8 mx-auto">-->
    <div class="container">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th>Jméno</th>
                <td><?php echo $user['name']; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $user['email']; ?></td>
            </tr>
            <tr>
                <th>Datum registrace</th>
                <td><?php echo $user['registration']; ?></td>
            </tr>
            <tr>
                <th>Zvolená barva</th>
                <td><?php echo $color; ?></td>
            </tr>
            <tr>
                <th>Změna barvy</th>
                <td>
                    <select id="color-pick" title="">
                        <option value="1">tmavě šedá</option>
                        <option value="2">modrá</option>
                        <option value="3">světle šedá</option>
                        <option value="4">zelená</option>
                        <option value="5">žlutá</option>
                        <option value="6">červená</option>
                    </select>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</section>

<script>
    function color_picker() {
        var req = new XMLHttpRequest();
        var str = "profile.php?color=".concat(select.value);
        req.open("GET", str);
        req.send(null);
    }
    var select = document.getElementById("color-pick");
    select.addEventListener("change", color_picker);
</script>

</body>

</html>
