<?php
    define('APP_NAME', 'PHP REST API TUTORIAL');

    try {

    $server_name = "localhost";
    $db_user     = 'root';
    $db_password = '';
    $db_name     = 'php_rest_api';

    $conn = new PDO("mysql:host=$server_name;dbname=$db_name", $db_user, $db_password);

    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 

    // echo "Connected Successfully";
    
} catch(PDOException $e) {

    echo "Connection Failed" .$e->getMessage();
}

?>