<link rel="stylesheet" href="./styles/header.min.css">

<header>
    <div class='heroImg'>
        <img class='profile-pic' src='./assets/face-24px.svg' alt='img'>
        <a href="settings.php" class="settings"><?php include "./components/svg/settings.php"?></a>
    </div>
    <div class='bottomHeader'>
        <h1><?php echo $name ?></h1>
        <h3><?php echo $email ?></h3>

        <div class="button-group">
            <?php if (!isset($_POST['friendProfile'])): ?>
            <div class="button-wrapper">
                <div class="count-request"></div>
                <button class='requests'>
                    <?php include './components/svg/people.php'?>
                </button><br>
                <span>Requests</span>
            </div>
            <?php endif?>
            <?php if (isset($_POST['friendProfile'])): ?>
            <div class="button-wrapper">
                <form action="./message.php" method='POST'>
                <button class='messages' name='friend' value='<?php echo $email ?>'>
                    <?php include './components/svg/message.php'?>
                </button><br>
                </form>
                <span>Messages</span>
            </div>
            <?php endif?>

            <?php if (!isset($_POST['friendProfile'])): ?>
            <div class="button-wrapper">
                <!-- <form action="./message.php" method='POST'> -->
                <div class="count-message"></div>
                <button class='messages' name='friend' value='<?php echo $email ?>'>
                    <?php include './components/svg/message.php'?>
                </button><br>
                <!-- </form> -->
                <span>Messages</span>
            </div>
            <?php endif?>


            <?php if (!isset($_POST['friendProfile'])): ?>
            <div class="button-wrapper">
                <button>
                    <?php include './components/svg/noti.php'?>
                </button><br>
                <span>Notification</span>

            </div>
                <form style="display:inline-block" action="./feed.php" method="POST">
            <div class="button-wrapper">
                    <button name="feed" value="hello">
                        <?php include './components/svg/feed.php'?>
                    </button><br>
                <span>Feed</span>
            </div>
                </form>
            <?php endif?>
        </div>
    </div>
</header>
