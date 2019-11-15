<?php
require_once 'dbconfig.php';
require_once 'User.php';
require_once 'functions.php';

try {
    $connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    if (isset($_POST['signUp'])) {
        signUp($connection);

    }
    if (isset($_POST['signIn'])) {
        signIn($connection);
    }

    if (isset($_POST['create-post'])) {
        setPost($connection);
    }

} catch (SQLExecption $error) {
    echo $connection->Error[2];
}
