<?php

require_once 'Classes/User.php';
require_once 'dbconfig.php';
require_once 'functions.php';

try {
    $connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $allUsers = findAllUsers($connection);
    $allPosts = postsForFeed($connection);

    if (isset($_POST['signUp'])) {
        signUp($connection);
    }
    if (isset($_POST['signIn'])) {
        signIn($connection);
    }
    if (isset($_POST['create-post'])) {
        createPost($connection);
    }
    if (isset($_POST['addFriend'])) {
        addFriend($connection);
    }
    if (isset($_POST['accept'])) {
        accept($connection);
    }
    if (isset($_POST['reject'])) {
        reject($connection);
    }
    if (isset($_POST['like'])) {
        likePost($connection);
    }
    if (isset($_POST['update'])) {
        editPost($connection);
    }
    if (isset($_POST['delete'])) {
        deletePost($connection);
    }
    if (isset($_POST['removeFriend'])) {
        removeFriend($connection);
    }
    if (isset($_POST['send'])) {
        sendMessage($connection);
    }
    if (isset($_POST['cPass'])) {
        changepassword($connection);
    }

    if (isset($_POST['dAcc'])) {
        deleteAccount($connection);
    }
    if (isset($_POST['clearData'])) {
        clearData($connection);
    }

} catch (SQLExecption $error) {
    echo $connection->Error[2];
}
