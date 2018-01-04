<php?
    session_start();
    // zjistim jetli prisel pozadavek GET na nastaveni jazyka
    if (isset($_GET["jazyk"])) {
        // pokud jo, tak nastavim cookie
        setcookie("jazyk", "value");
    }

    // pokud mam nejake nastaveni pro jazyk, tak vypisu
    if (isset($_COOKIE["jazyk"])) {
        echo $_COOKIE["jazyk"];
    }

    echo SID;

?>