<?php
$profilePage = '../Profile/profile.php';
$loginPage = '../index.php';
$errorPage = '../404.html';

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
        header("Location: " . $GLOBALS['profilePage']);
    }
}

if (isset($_POST['logout'])) {
    unset($_SESSION['user']);
    session_destroy();
    header("location: " . $GLOBALS['loginPage']);
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
        message($friendEmail . " is now your friend");
    }
}

function message($string)
{
    echo "<script> alert('$string') </script>";
}
