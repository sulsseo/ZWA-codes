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
    $sql = "SELECT * FROM $table WHERE id_article=$id";
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
    $sql = "SELECT * FROM $table WHERE username=$username";
    // $sql = "SELECT * FROM $table WHERE id_user=123";
    $result = $link->query($sql);

    mysqli_close($link);

    // print_r($result->fetch_assoc());
    
    if (!$result) {
        return null;
    } else {
        return $result->fetch_assoc();
    }
}

/**
 * Add new user to db after registration
 * 
 * user table[id, username(email), pass, registration time]
 */
function add_user($name, $username, $plain_password) {
    $table = 'user';
    $link = connect();

    // unique id for new user
    $id = uniqid();
    
    // get current time 
    // $reg = date("F Y h:i:s A");
    $reg = time();
    
    // hash password
    $pass = password_hash($plain_password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO user (id_user, name, username, password, registration) VALUES ('$id', '$name', '$username', '$pass', '$reg')";

    // send builded query
    if(mysqli_query($link, $sql)){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    } 
}

/**
 * PDO connection. NOT WORK NOW
 */
function add_user2($sername, $plain_password) {
    $conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, null);
    
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // unique id for new user
    $id = uniqid();

    // get current time 
    $reg = date("F Y h:i:s A");
    
    // hash password
    $pass = password_hash($plain_password.$username, PASSWORD_DEFAULT);

    try {
        // proceed transaction
        $conn->beginTransaction();
        
        $conn->exec("INSERT INTO user (id_user, username, password, registration) 
                VALUES ($id, $username, $pass, $reg)");

        // commit the transaction
        $conn->commit();

        echo "New records created successfully";
    
    } catch(PDOException $e) {
        // roll back the transaction if something failed
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}

?>