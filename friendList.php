
<?php $user->setFriends($connection)?>
<aside class='friends'>
    <h1>Friends</h1>

    <?php foreach ($user->getFriends() as $friend): ?>
    <?php $fname = $friend->getFname();?>
    <?php $lname = $friend->getLname();?>
            <div class='friend'>
                <img src='' alt='img'>
                    <h3><?php echo "$fname $lname" ?></h3>
                    <form action="#" method='POST'>
                        <button name='profile' value='<?php echo $friend->getEmail() ?>'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M0 0h24v24H0z' fill='none'/><path d='M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z'/></svg>
                        </button>
                        <button name='message'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z'/><path d='M0 0h24v24H0z' fill='none'/></svg>
                        </button>
                    </form>
            </div>
    <?php endforeach?>
</aside>
