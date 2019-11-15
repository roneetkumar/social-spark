<?php
$profilePage = '../profile.php';
$loginPage = './index.php';
$errorPage = '../404.html';
include_once 'User.php';

session_start();

function signUp($connection)
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
    $user = new User($fname, $lname, $email, $pass);
    $response = $user->create($connection);

    if ($response) {
        // $_SESSION['logged-user'] = $email;
        $_SESSION['user'] = $user;

        header("Location: " . $GLOBALS['profilePage']);
        exit();
    } else {
        header("Location: $errorPage");
    }
}

function signIn($connection)
{
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
    echo $pass;

    $user = new User();

    $user->setEmail($email);

    $user = $user->find($connection);

    if ($user != null) {

        $dpass = $user->getPassword();
        $demail = $user->getEmail();
        if ($dpass == $pass) {
            $_SESSION['user'] = $user;
            header("Location: " . $GLOBALS['profilePage']);
            exit();
        } else {
            echo "Wrong password";
        }
    } else {
        echo "User does not exist";
    }

}

function setPost($connection)
{
    $content = $_POST['content'];
    $user = $_SESSION['user'];

    $user->createPost($content, null, $connection);

}

if (isset($_POST['logout'])) {
    unset($_SESSION['user']);
    session_destroy();
    header("location: " . $GLOBALS['loginPage']);
}
