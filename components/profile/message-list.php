
<div class="message-list">

    <h2>Messages - <?php echo count(displayMessages($connection)) ?></h2>
    <!-- <form action="" method='POST'> -->
        <?php foreach (displayMessages($connection) as $message): ?>
        <?php $messageFrom = $message->getMessageFrom()?>

        <div class='friend'>
        <img src='./assets/face-24px.svg' alt='img'>
        <h3><?php echo $messageFrom ?></h3>
        <div class="action-btn">
            <form action="#" method='POST'>
                <button name='friendProfile' value='<?php echo $messageFrom ?>'>
                <?php include './components/svg/profile.php'?>
                </button>
            </form>
            <form action="./message.php" method='POST'>
                <button name='friend' value='<?php echo $messageFrom ?>'>
                    <?php include './components/svg/message.php'?>
                </button>
            </form>
        </div>
        </div>
        <?php endforeach?>
    <!-- </form> -->
</div>
