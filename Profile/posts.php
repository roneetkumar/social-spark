<div class='grid'>

    <?php if (!isset($_POST['friendProfile'])): ?>
        <form action='../Management/main.php' method='POST' class='createPost'>
            <textarea type='text' name='content' placeholder="create a post"></textarea>
            <input type='submit' name='create-post'>
        </form>
    <?php endif?>

    <div class="posts">
        <?php foreach ($user->getPosts($connection) as $key => $post): ?>
            <?php $id = $post->getPostID();?>
            <?php $content = $post->getContent();?>
            <?php $image = $post->getImage();?>
            <?php $date = $post->getDate();?>
            <?php $likes = $post->getLikes();?>


            <div class="post">
                <div class="postHeader">
                    <h4 class="email"><?php echo $user->getFname() ?></h4>
                    <h5 class="date"><?php echo $date ?></h5>
                    <h6 class='likes'> <?php echo $likes ?></h6>
                </div>
                <div class="postBody">
                    <img src="<?php echo $image ?>" alt="">
                    <p><?php echo "$content" ?></p>
                </div>
                <form action="" method='POST' class="postFooter">
                    <button name='like' value='<?php echo $id ?>'>LIKE</button>
                    <button name='edit' value='<?php echo $id ?>'>EDIT</button>
                    <button name='delete' value='<?php echo $id ?>'>DELETE</button>
                </form>
            </div>
        <?php endforeach?>
</div>
