<?php

require_once './management/main.php';

if (isset($_POST['friend']) || isset($_SESSION['friend'])) {

    if (isset($_POST['friend'])) {
        $friend = $_POST['friend'];
    } else {
        $friend = $_SESSION['friend'];
    }

    $user = $_SESSION['user'];

    unsetMessages($connection, $friend);

    $allMessages = $user->getMessage($connection, $friend);

    $from = Message::findName($connection, $user->getEmail());
    $to = Message::findName($connection, $friend);

} else {
    header("Location: $profilePageV2");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/messages.min.css">
</head>
<body>
    <form class="back" action="./profile.php">
        <button class="profile">
            <?php include './components/svg/profile.php'?>
        </button>
    </form>
    <form class='wrapper' action="" method="POST">
         <span class="toUser"><?php echo $to ?></span>
         <span class="fromUser"><?php echo $from ?></span>

        <div class="messages">

        <?php foreach ($allMessages as $messsage): ?>

        <?php if ($friend == $messsage->getMessageFrom()): ?>
            <div class="from">
                <h1>
                    <?php echo $messsage->getMessageDate() ?>
                </h1>
                <?php echo $messsage->getMessage() ?>
            </div>
        <?php endif?>

        <?php if ($friend == $messsage->getMessageTo()): ?>
            <div class="to">
                <h1>
                <?php echo $messsage->getMessageDate() ?>
                </h1>
                <?php echo $messsage->getMessage() ?>
            </div>
        <?php endif?>

        <?php endforeach?>

        </div>
        <div class="messageWrapper">
        <textarea name="content" placeholder="send a message">
        </textarea>

        <input style="display:none" type="text" name='friend'>
        <button class='send' type="submit" name="send" value='<?php echo $friend ?>'>
            <?php include "./components/svg/send.php"?>
        </button>
        </div>
    </form>

</body>




<script>
function gotoBottom(){
   var element = document.querySelector('.messages');
   element.scrollTop = element.scrollHeight;
}

gotoBottom();


</script>

</html>
