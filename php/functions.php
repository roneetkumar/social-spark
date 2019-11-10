<?php

function signUp($connection)
{
    $fname = $_GET['fname'];
    $lname = $_GET['lname'];
    $email = $_GET['email'];
    $pass = $_GET['pass'];

    $profilePage = '../profile.html';
    $loginPage = '../index.html';
    $errorPage = '../404.html';

    $userID = rand();

    $user = new User($fname, $lname, $email, $pass);

    $user->setUserID($userID);

    $response = $user->create($connection);

    if ($response) {
        header("Location: $profilePage");
    } else {
        header("Location: $errorPage");
    }
}

function signIn($connection)
{
    $email = $_GET['email'];
    $pass = $_GET['pass'];

    $profilePage = '../profile.html';
    $loginPage = '../index.html';
    $errorPage = '../404.html';

    $user = new User();

    $user->setEmail($email);

    $user = $user->find($connection);

    $dpass = $user->getPassword();

    if ($dpass == $pass) {
        header("Location: $profilePage");
    } else {
        header("Location: $errorPage");
    }
}
