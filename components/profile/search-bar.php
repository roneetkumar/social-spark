<link rel="stylesheet" href="./styles/search.min.css">



<div class='allUsers'>
    <form method='POST' action='./profile.php'>
    <?php foreach ($allUsers as $key => $value): ?>
        <?php $friendName = $value->getFname() . " " . $value->getLname();?>
        <?php $friendEmail = $value->getEmail();?>

        <div class='searchItem'>
            <span><?php echo $friendName ?></span>
            <button name='addFriend' value='<?php echo $friendEmail ?>'>
                Add Friend
            </button>
            <button name='friendProfile' value='<?php echo $friendEmail ?>'>
                View
            </button>
        </div>
    <?php endforeach?>
    </form>
</div>

<div class="search-bar">
    <?php if (basename($_SERVER['PHP_SELF']) == 'feed.php'): ?>
        <form action="./profile.php" method="post">
            <button class="profile">
                <?php include './components/svg/profile.php'?>
            </button>
        </form>
    <?php else: ?>
        <button class="menu">
            <?php include './components/svg/menu.php'?>
        </button>
    <?php endif?>

    <div class="search">
        <?php include './components/svg/search.php'?>
        <input type="text" name="search" placeholder="Find a friend" autocomplete='off'>
    </div>
    <form action="" method="post">
        <button class="logout" type="submit" name='logout' value='logout'>
            <?php include './components/svg/logout.php'?>
        </button>
    </form>

</div>
