<?php
define ("DB_HOST", "127.0.0.1"); 
define ("DB_NAME", "trmaljak"); 
define ("DB_USER", "trmaljak"); 
define ("DB_PASSWD", "webove aplikace");

/**
 * Connect to defined database. 
 * 
 * Return: open link to connection. NEED CLOSE!
 */
function connect() {
    if (!$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_NAME)) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    return $link;
}


/**
 * Get article from db by id. 
 * 
 * Return: html of article [title, perex, body]
 */
function get_article($id) {
    $table = 'article';
    $link = connect();

    // build query
    $sql = "SELECT * FROM `".$table."` WHERE `id_article`=".$id;
    $result = $link->query($sql);

    // close connection
    mysqli_close($link);

    $my_row = $result->fetch_assoc();
    echo $my_row["title"];
    echo $my_row["perex"];
    echo $my_row["body"]; 
}

/**
 * Get user row from database
 */
function get_user($username) {
    $table = 'user';
    $link = connect();

    // build query
    $sql = "SELECT * FROM`".$table."`WHERE `username`=".$username;
    $result = $link->query($sql);

    mysqli_close($link);
    echo $result;
    return $result->fetch_assoc();
}

?>