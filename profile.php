<?php

require_once './php/functions.php';
require_once './php/main.php';

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];

    $name = $user->getFname() . " " . $user->getLname();
}

if (isset($_POST['profile'])) {
    $profileEmail = $_POST['profile'];
    $user = new User();
    $user->setEmail($profileEmail);
    $user = $user->find($connection);
    $name = $user->getFname() . " " . $user->getLname();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="styles/profile.min.css">
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="./assets/favicon.ico">
    <script src="./functions/includeScript.js"></script>
    <script src="functions/profile.js" defer></script>

</head>



<div class="profile-wrapper">
    <div class="overlay"></div>
    <body>
        <?php include 'searchUser.php'?>
        <?php include 'header.php'?>
        <main>
            <?php include 'friendList.php'?>
            <?php include 'content-grid.php'?>
        </main>
    </div>
</body>

</html>
