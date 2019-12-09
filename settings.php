<?php require_once './management/main.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/tab.min.css">
</head>
<body>
<div class="tab-wrapper">
    <a href="profile.php" class="backProfile">
        <?php include "./components/svg/profile.php"?>
    </a>
    <h1>User Settings</h1>
<form action="" method="POST">
    <button class="tab" type="submit" name="pass">
        <?php include './components/svg/changePass.php'?>
        <span>Change Password</span>
    </button>
    <button class="tab" type="submit" name="theme">
        <?php include './components/svg/theme.php'?>
        <span>Change Theme</span>
    </button>
    <button class="tab" type="submit" name="deleteAcc">
        <?php include './components/svg/deleteAcc.php'?>
        <span>Delete Account</span>

    </button>
    <button class="tab" type="submit" name="removeData">
        <?php include './components/svg/clearData.php'?>
        <span>Clear Data</span>

    </button>
    <button class="tab" type="submit" name="privacy">
        <?php include './components/svg/deleteAcc.php'?>
        <span>User Privacy</span>
    </button>
    <button class="tab" type="submit" name="blocked">
        <?php include './components/svg/deleteAcc.php'?>
        <span>
            Blocked Users
        </span>
    </button>
    <button class="tab" type="submit" name="">
        <?php include './components/svg/deleteAcc.php'?>

    </button>
    <button class="tab" type="submit" name="">
        <?php include './components/svg/deleteAcc.php'?>

    </button>
    <button class="tab" type="submit" name="">
        <?php include './components/svg/deleteAcc.php'?>

    </button>
</form>

</div>

<div class="switch-wrapper">
<?php if (isset($_POST['pass'])): ?>
    <h1>Change Password</h1>
    <form class='changepass' action="" method="POST">
        <input type="text" name="oPass" placeholder="Enter old password"><br>
        <input type="password" name="nPass"  placeholder="Enter new password"><br>
        <input type="password" name="rPass"  placeholder="Re-enter new password"><br>
        <button type="submit" name="cPass">Change Password</button>
        <button type="reset">Reset</button>
    </form>

<?php endif?>

<?php if (isset($_POST['theme'])): ?>
     <h1>Change Theme</h1>

    <form action="" method="POST">
            <input type="radio" name="color" value="dark">
            <label for="color">Dark</label><br><br>
            <input type="radio" name="color" value="light">
            <label for="color">Light</label>
            <br><br><br><br>
            <button type="submit" name='color'>Apply</button>
    </form>


<?php endif?>

<?php if (isset($_POST['deleteAcc'])): ?>
    <form action="" method="POST">
        <h1>Deactivate Account</h1>
        <button type="submit" name='dAcc'>DEACTIVATE</button>
    </form>
<?php endif?>

<?php if (isset($_POST['removeData'])): ?>

    <form action="" method="POST">
    <h1>Remove User Data</h1>
        <button type="submit" name='clearData'>Clear Data</button>
    </form>

<?php endif?>

<?php if (isset($_POST['privacy'])): ?>

    <form action="" method="POST">
    <h1>User Privacy</h1>
        <button type="submit" name=''>Button</button>
    </form>

<?php endif?>

<?php if (isset($_POST['blocked'])): ?>

    <form action="" method="POST">
    <h1>Blocked Users</h1>
        <button type="submit" name=''>Button</button>
    </form>

<?php endif?>

</div>

</body>
</html>
