<?php
    $username = $_GET["username"];
    $occupied_usernames = ["jana", "petr", "honza", "kuba"];
    if (in_array($username, $occupied_usernames)) {  // nebo nejaka rozumejsi kontrola
        echo("not_available");
    } else {
        echo("available");
    }
?>