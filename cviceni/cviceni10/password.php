<?php
    $heslo = password_hash("heslo", PASSWORD_DEFAULT);
    echo $heslo;
    echo "<br>";

    if (password_verify("heslo", $heslo)) {
        echo "Yes, you're in.";
    } else {
        echo "No, try it again.";
    }
?>