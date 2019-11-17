<?php

require_once '../Management/main.php';

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $name = $user->getFname() . " " . $user->getLname();

    if (isset($_POST['friendProfile'])) {
        $profileEmail = $_POST['friendProfile'];
        $user = new User();
        $user->setEmail($profileEmail);
        $found = $user->find($connection);
        if ($found) {
            $name = $user->getFname() . " " . $user->getLname();
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
    <link rel="stylesheet" href="../styles/profile.min.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="../assets/favicon.ico">
    <script src="../functions/profile.js" defer></script>
</head>
<body>
    <div class="profile-wrapper">
        <div class="overlay"></div>
        <?php include 'searchUser.php'?>
        <?php include 'header.php'?>
        <main>
            <?php include 'friendList.php'?>
            <?php include 'posts.php'?>
        </main>
    </div>
</body>
</html>
