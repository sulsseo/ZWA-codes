<?php
/**
 * Database library class. Use for database handle.
 */


/**
 * Connect to defined database.
 *
 * Return: open link to connection. NEED CLOSE!
 */
function connect()
{
    $db_host = "localhost";
    $db_user = "trmaljak";
    $db_pass = "webove aplikace";
    $db_name = "trmaljak";

    try {
        $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    } catch (PDOException $e) {
        // echo "Error: " . $e->getMessage();
        error_log("db_lib.php(22): fail connection to DB", 1, '../error.log');
    }
}


/**
 * Get article from db by id.
 *
 * Return: html of article [title, perex, body]
 * @param $id int article id in db
 * @return mixed article data in array
 */
function get_article($id)
{
    $table = 'article';
    $conn = connect();

    try {
        // build query
        $query = $conn->prepare("SELECT * FROM $table WHERE id_article=$id");
        $query->execute();

        // close connection
        $conn = null;

        $response = $query->fetch(PDO::FETCH_NAMED);
        return $response;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

/**
 * Test print function
 *
 * @param $id article id in db
 */
function print_article($id)
{
    $article = get_article($id);

    echo $article["title"];
    echo $article["perex"];
    echo $article["body"];
}


/**
 * Get user row from database
 *
 * @param $email email in plain text to identify user in db
 * @return mixed user data in array
 */
function get_user_by_mail($email)
{
    $table = 'user';

    try {
        $conn = connect();

        // prepare query and exec
        $query = $conn->prepare("SELECT * FROM $table WHERE email='$email'");
        $query->execute();

        $conn = null;

        // parse response
        $response = $query->fetch(PDO::FETCH_NAMED);

        return $response;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

/**
 * Add new user to db after registration - PDO connection
 *
 * user table[id, name, email, pass, registration time]
 *
 * @param $name user name
 * @param $email user email
 * @param $plain_password password in plain text from form
 */
function add_user($name, $email, $plain_password)
{

    $conn = connect();

    $id = uniqid();

    $reg = date("F Y h:i:s A");

    $pass = password_hash($plain_password . $email, PASSWORD_DEFAULT);

    try {
        // proceed transaction
        $conn->beginTransaction();

        $query = $conn->prepare('INSERT INTO user (id_user, name, email, password, registration) VALUES (?, ?, ?, ?, ?)');
        $query->execute(array($id, $name, $email, $pass, $reg));

//        // commit the transaction
//        $conn->commit();

    } catch (PDOException $e) {
        // roll back the transaction if something failed
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}

/**
 * Check if user is in database and everything is correct
 *
 * @param $email mail of user given in plain text
 * @param $password password in plain text from form
 * @return bool everything is correct
 */
function check_user($email, $password) {
    $user_record = get_user_by_mail($email);

    if (is_array($user_record)) {
        if (isset($user_record["email"]) && $user_record["email"] == $email) {
            if (password_verify($password.$email, $user_record["password"])) {
                return true;
            } else return false;
        } else return false;
    } else {
        false;
    }
}

/**
 * Return number of article records
 */
function get_article_records()
{
    $conn = connect();

    try {
        $query = $conn->prepare("SELECT MAX(id_article) FROM article");
        $query->execute();

        $conn = null;

        // parse response
        $response = $query->fetch(PDO::FETCH_NAMED);

        return $response['MAX(id_article)'];

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

/**
 * Check if someone is logged in. If $_SESSION has some information
 *
 * @return bool if test was positive, false otherwise
 */
function check_login() {
    session_start();

    if(isset($_COOKIE['SID']) && isset($_SESSION[$_COOKIE['SID']])) {
        return true;
    } else return false;
}