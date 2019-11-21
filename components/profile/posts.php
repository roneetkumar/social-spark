<link rel="stylesheet" href="./styles/posts.min.css">

<div class='post-grid'>

    <?php if (!isset($_POST['friendProfile'])): ?>
    <form action='#' method='POST' class='createPost'>
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
        <?php $likes = $post->getLikes($connection);?>
        <?php $canEdit = $post->getCanEdit();?>

            <div class="post">
                <div class="postHeader">
                    <h5 class="name"><?php echo $user->getFname() ?></h5>
                    <h5 class="date"><?php echo $date ?>
</h5>
                    <h6 class="likes"><?php echo $likes ?></h6>
                </div>
                <div class="postBody">
                <?php if ($image != null): ?>
                    <img src="<?php echo $image ?>" alt="">
                <?php endif?>
                    <p contenteditable='false'><?php echo "$content" ?></p>
                </div>
                <form action="" method='POST' class="postFooter">
                    <button name='like' value='<?php echo $id ?>'>
                    <?php include "./components/svg/like.php"?>
                    </button>
                        <?php if (!isset($_POST['friendProfile'])): ?>
                            <button class='editPost' name='edit' value='<?php echo $id ?>'><?php include "./components/svg/edit.php"?></button>
                            <button name='delete' value='<?php echo $id ?>'><?php include "./components/svg/delete.php"?></button>
                        <?php endif?>
                </form>
            </div>
        <?php endforeach?>
    </div>
</div>
