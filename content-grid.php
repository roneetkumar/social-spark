<div class='grid'>

 <?php if (!isset($_POST['profile'])): ?>
    <form action='#' method='POST' class='createPost'>
        <input type='text' name='content'>
        <input type='submit' name='create-post'>
    </form>
 <?php endif?>


    <?php $user->setPosts($connection);?>

    <div class="posts">

        <?php foreach ($user->getPosts() as $key => $post): ?>
            <?php $id = $post->getPostID();?>
            <?php $content = $post->getContent();?>
            <?php $image = $post->getImage();?>
            <?php $date = $post->getDate();?>


            <div class="post">
                <div class="postHeader">
                    <h4 class="email"><?php echo $user->getFname() ?></h4>
                    <h5 class="date"><?php echo $date ?></h5>
                </div>
                <div class="postBody">
                    <img src="<?php echo $image ?>" alt="">
                    <p><?php echo "$content" ?></p>
                </div>
                <div class="postFooter"></div>
            </div>
            <?php endforeach?>
    </div>
</div>
