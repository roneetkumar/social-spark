<?php
require_once './management/main.php';

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $name = $user->getFname() . " " . $user->getLname();
    $email = $user->getEmail();

    if (isset($_POST['friendProfile'])) {
        $profileEmail = $_POST['friendProfile'];
        $user = new User();
        $user->setEmail($profileEmail);
        $found = $user->find($connection);
        if ($found) {
            $name = $user->getFname() . " " . $user->getLname();
            $email = $user->getEmail();
        }
    }
}

if (!isset($_SESSION['user'])) {
    header("Location: $loginPage");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/feed.min.css">
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="./assets/favicon.ico">
    <script src="./functions/feed.js" defer></script>
</head>
<body>
    <div class="feed-wrapper">

        <div class="overlay"></div>


        <?php include './components/profile/search-bar.php'?>

        <!-- logo -->
        <div class="logo-wrapper">
            <div class="logo">
                <?php include "assets/logo.php"?>
            </div>
            <h1>Social<br>Spark</h1>
        </div>


        <main>
            <?php include './components/profile/allPosts.php'?>
        </main>
        <h4>Copyright &copy; 2019 All rights reserved</h4>
    </div>
</body>
</html>
