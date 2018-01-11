<?php
    require("db_lib.php");
    // get_article(3);
    // add_user2("kuba", "heslo");
    // echo date("F Y h:i:s A");
    $user = 'jakub.trmal@gmail.com';
    print_r(get_user_by_mail($user));
    if (is_array(get_user_by_mail($user))) {
        echo "yes";
    } else {
        echo "no";
    }
    // print_article(3);
    
    // add_user2("kuba", "mail@email.com", "heslo");
