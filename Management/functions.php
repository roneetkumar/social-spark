<?php

require_once "classes/Post.php";

$profilePage = '../profile.php';
$profilePageV2 = './profile.php';
$loginPage = './index.php';
$errorPage = './404.html';

session_start();

function signUp($connection)
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
    $user = new User($fname, $lname, $email, $pass);
    $response = $user->createUser($connection);

    if ($response) {
        $_SESSION['user'] = $user;
        header("Location: " . $GLOBALS['profilePage']);
    } else {
        header("Location: $errorPage");
    }
}

function signIn($connection)
{
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
    $user = new User();
    $user->setEmail($email);
    $found = $user->find($connection);

    if ($found) {
        $userPassword = $user->getPassword();
        $userEmail = $user->getEmail();
        if ($userPassword == $pass) {
            $_SESSION['user'] = $user;
            header("Location: " . $GLOBALS['profilePage']);
        } else {
            echo "Wrong password";
        }
    } else {
        echo "User does not exist";
    }
}

function findAllUsers($connection)
{
    $sql = "SELECT * from user";
    $prepare = $connection->prepare($sql);
    $prepare->execute();
    $result = $prepare->fetchAll();

    foreach ($result as $key => $value) {
        if (sizeof($result) > 0) {
            $fname = $value['FirstName'];
            $lname = $value['LastName'];
            $email = $value['Email'];
            $allUsers[$key] = new User($fname, $lname, $email);
        } else {
            return null;
        }
    }
    return $allUsers;
}

function createPost($connection)
{
    $content = $_POST['content'];
    $user = $_SESSION['user'];
    $result = $user->setPost($content, null, $connection);

    if ($result) {
        header("location: " . $_SERVER['PHP_SELF']);
    }
}

if (isset($_POST['logout'])) {
    unset($_SESSION['user']);
    session_destroy();
    header("location: " . $_SERVER['PHP_SELF']);
}

function addFriend($connection)
{
    $user = $_SESSION['user'];
    $friendEmail = $_POST['addFriend'];

    $result = $user->sendRequest($connection, $friendEmail);
    if ($result) {
        message("Request Sent");
    } else {
        message("can't sent request at the moment");
    }
}

function accept($connection)
{
    $user = $_SESSION['user'];
    $friendEmail = $_POST['accept'];

    $result = $user->acceptRequest($connection, $friendEmail);
    if ($result) {
        header("location: " . $_SERVER['PHP_SELF']);
    }
}

function reject($connection)
{
    $user = $_SESSION['user'];
    $friendEmail = $_POST['reject'];

    $result = $user->rejectRequest($connection, $friendEmail);
    if ($result) {
        header("location: " . $_SERVER['PHP_SELF']);
    }
}

function likePost($connection)
{
    $user = $_SESSION['user'];
    $postID = $_POST['like'];
    $result = $user->likePost($connection, $postID);
    if ($result) {
        header("location: " . $_SERVER['PHP_SELF']);
    }

}

function deletePost($connection)
{
    $user = $_SESSION['user'];
    $postID = $_POST['delete'];
    $result = $user->deletePost($connection, $postID);
    if ($result) {
        header("location: " . $_SERVER['PHP_SELF']);
    }

}

function editPost($connection)
{
    $user = $_SESSION['user'];
    $postID = $_POST['edit'];

    // $result = $user->editPost($connection, $postID);
    // if ($result) {
    header("location: " . $_SERVER['PHP_SELF']);
    // }

}

function removeFriend($connection)
{
    $user = $_SESSION['user'];
    $friendEmail = $_POST['removeFriend'];
    $result = $user->removeFriend($connection, $friendEmail);
    if ($result) {
        header("location: " . $_SERVER['PHP_SELF']);
    }

}

function message($string)
{
    echo "<script> alert('$string') </script>";
}

function postsForFeed($connection = null)
{
    $posts = [];
    $sql = "SELECT * FROM posts ORDER BY date DESC";
    $prepare = $connection->prepare($sql);
    $prepare->execute();
    $result = $prepare->fetchAll();

    foreach ($result as $key => $tempPost) {
        if (sizeof($result) > 0) {
            $postID = $tempPost['postID'];
            $email = $tempPost['email'];
            $content = $tempPost['content'];
            $image = $tempPost['image'];
            $date = $tempPost['date'];

            $posts[$key] = new Post($postID, $email, $content, $image, $date);
        }
    }
    return $posts;

}
