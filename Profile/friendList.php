
<aside class='friends'>
    <h1>Friends - <?php echo count($user->getFriends($connection)) ?></h1>
        <form action="#" method='POST'>
            <?php foreach ($user->getFriends($connection) as $friend): ?>
            <?php $friendName = $friend->getFname() . " " . $friend->getLname();?>
            <?php $friendsEmail = $friend->getEmail();?>

                    <div class='friend'>
                        <img src='../assets/face-24px.svg' alt='img'>
                            <h3> <?php echo $friendName ?></h3>
                                <button name='friendProfile' value='<?php echo $friendsEmail ?>'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M0 0h24v24H0z' fill='none'/><path d='M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z'/></svg>
                                </button>
                                <button name='message'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z'/><path d='M0 0h24v24H0z' fill='none'/></svg>
                                </button>
                    </div>
            <?php endforeach?>
        </form>
        <br>
        <br>
        <hr>
        <?php if (!isset($_POST['friendProfile'])): ?>
            <!-- <aside class=""> -->
            <h1 style='margin-top:30px'>Requests - <?php echo count($user->getRequest($connection)) ?></h1>
            <form action="#" method='POST'>


                <?php foreach ($user->getRequest($connection) as $friend): ?>
                <?php $friendName = $friend->getFname() . " " . $friend->getLname()?>
                <?php $friendsEmail = $friend->getEmail()?>
                    <div class='friend'>
                        <img src='../assets/face-24px.svg' alt='img'>
                        <h3> <?php echo $friendName ?></h3>
                        <button name='accept' value='<?php echo $friendsEmail ?>'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                        </button>
                        <button name='reject' value='<?php echo $friendsEmail ?>'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19 13H5v-2h14v2z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                        </button>
                    </div>
                <?php endforeach?>
            </form>
            <!-- </aside> -->
        <?php endif?>
</aside>
