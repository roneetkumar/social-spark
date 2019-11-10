<?php
require_once 'dbconfig.php';
require_once 'User.php';
require_once 'functions.php';

try {
    $connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    if (isset($_GET['signUp'])) {
        signUp($connection);

    } elseif (isset($_GET['signIn'])) {
        signIn($connection);
    }

} catch (SQLExecption $error) {
    echo $connection->Error[2];
}
