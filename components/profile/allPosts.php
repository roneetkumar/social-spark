
<link rel="stylesheet" href="./styles/posts.min.css">

<div class='post-grid' style='max-width: 1100px; margin:auto'>

    <form action='#' method='POST' class='createPost'>
        <textarea type='text' name='content' placeholder="create a post"></textarea>
        <input type='submit' name='create-post'>
    </form>
    <hr >

    <div class="posts">
        <?php $currentUser = $user->getEmail()?>
        <?php foreach ($allPosts as $key => $post): ?>
        <?php $id = $post->getPostID();?>
        <?php $content = $post->getContent();?>
        <?php $image = $post->getImage();?>
        <?php $date = $post->getDate();?>
        <?php $likes = $post->getLikes($connection);?>
        <?php $canEdit = $post->getCanEdit();?>

        <?php $email = $post->getEmail();?>
        <?php $user = new User();?>
        <?php $user->setEmail($email);?>
        <?php $user->find($connection);?>


        <div class="post">
            <div class="postHeader">
                <h5 class="date"><?php echo $date ?></h5>
                <h5 class="name"><?php echo $user->getFname() ?></h5>
                <h5 class="likes"><?php echo $likes ?></h5>
            </div>
            <div class="postBody">
            <?php if ($image != null): ?>
                <img src="<?php echo $image ?>" alt="">
            <?php endif?>
                <p contenteditable='false'><?php echo "$content" ?></p>
            </div>
            <form action="#" method='POST' class="postFooter">
                <button name='like' value='<?php echo $id ?>'>
                <?php include "./components/svg/like.php"?>
                </button>

                <?php if ($currentUser == $email): ?>
                    <button class='editPost' name='edit' value='<?php echo $id ?>'><?php include "./components/svg/edit.php"?></button>
                    <button name='delete' value='<?php echo $id ?>'><?php include "./components/svg/delete.php"?></button>
                <?php else: ?>
                    <button name='save' value='<?php echo $id ?>'>
                    <?php include "./components/svg/save.php"?>
                    </button>
                <?php endif?>
            </form>
        </div>
        <?php endforeach?>
    </div>
</div>
