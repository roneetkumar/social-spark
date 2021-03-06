<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="styles/index.min.css">
    <script src="functions/index.js" defer></script>
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="./assets/favicon.ico">
</head>

<body>
    <div class="wrapper">
        <!-- sign in card -->
        <div class="signInCard">
            <div class="content">
                <h1>Sign In</h1>
                <?php include './components/login/sign-in.php'?>
            </div>
            <div class="tapArea">
                <div class="ring"></div>
            </div>
        </div>

        <!-- logo -->
        <div class="logo">
            <?php include "assets/logo.php"?>
        </div>

        <!-- sign up card -->
        <div class="signUpCard">
            <div class="content">
                <h1>Sign Up</h1>
                <?php include './components/login/sign-up.php'?>
            </div>
            <div class="tapArea">
                <div class="ring"></div>
            </div>
        </div>

    </div>
</body>

</html>
