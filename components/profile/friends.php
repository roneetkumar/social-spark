<link rel="stylesheet" href="./styles/friends.min.css">
<div class='friendsList'>
    <h2>Friends - <?php echo count($user->getFriends($connection)) ?></h2>
        <?php foreach ($user->getFriends($connection) as $friend): ?>
        <?php $friendName = $friend->getFname() . " " . $friend->getLname();?>
        <?php $friendsEmail = $friend->getEmail();?>

        <div class='friend'>
            <img src='./assets/face-24px.svg' alt='img'>
            <h3><?php echo $friendName ?></h3>

            <div class="action-btn">
                <form action="#" method='POST'>
                    <button name='friendProfile' value='<?php echo $friendsEmail ?>'>
                    <?php include './components/svg/profile.php'?>
                    </button>
                </form>
                <form action="./message.php" method='POST'>
                    <button name='friend' value='<?php echo $friendsEmail ?>'>
                        <?php include './components/svg/message.php'?>
                    </button>
                </form>
                <form action="#" method='POST'>
                     <button name='removeFriend' value='<?php echo $friendsEmail ?>'>
                    <?php include './components/svg/remove.php'?>
                </button>
                </form>
            </div>
        </div>
        <?php endforeach?>
    </form>
</div>


<div class="request-list">
    <h2>Requests - <?php echo count($user->getRequest($connection)) ?></h2>
    <form action="" method='POST'>
        <?php foreach ($user->getRequest($connection) as $friend): ?>
        <?php $friendName = $friend->getFname() . " " . $friend->getLname()?>
        <?php $friendsEmail = $friend->getEmail()?>

        <div class='friend'>
        <img src='./assets/face-24px.svg' alt='img'>
        <h3><?php echo $friendName ?></h3>
        <div class="action-btn">
            <button name='accept' value='<?php echo $friendsEmail ?>'>
                <?php include "./components/svg/add.php"?>
            </button>
            <button name='reject' value='<?php echo $friendsEmail ?>'>
                <?php include "./components/svg/remove.php"?>
            </button>
            </div>
        </div>
        <?php endforeach?>
    </form>
</div>
