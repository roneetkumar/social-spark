<link rel="stylesheet" href="./styles/posts.min.css">

<div class='post-grid'>

    <?php if (!isset($_POST['friendProfile'])): ?>
    <form action='#' method='POST' class='createPost'>
        <textarea type='text' name='content' placeholder="create a post"></textarea>
        <input type="file" name="file" accept="image/*">
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

            <div class="post">
                <div class="postHeader">
                    <h6 class="date"><?php echo $date ?>
                    <h5 class="name"><?php echo $user->getFname() ?></h5>
                    <h5 class="likes"><?php echo $likes ?></h5>
                </div>
                <div class="postBody">
                <?php if ($image != null): ?>
                    <img src="<?php echo $image ?>" alt="">
                <?php endif?>
                    <p contenteditable='false'><?php echo "$content" ?></p>
                </div>
                <div class="postFooter notEdit">
                <form action="" method='POST'>
                    <button name='like' value='<?php echo $id ?>'>
                    <?php include "./components/svg/like.php"?>
                    </button>
                </form>

                <?php if (!isset($_POST['friendProfile'])): ?>
                    <button class='editPost' name='edit' value='<?php echo $id ?>'><?php include "./components/svg/edit.php"?></button>
                <form action="" method='POST'>
                    <button name='delete' value='<?php echo $id ?>'><?php include "./components/svg/delete.php"?></button>
                <?php endif?>
                </form>
                </div>
                <div class="postFooter edit" style='display:none'>
                    <form class='editForm' action="" method='POST' >
                        <textarea name='newPost' style="display:none" class="fakeForm" cols="30" rows="10"></textarea>
                        <button name='update' value='<?php echo $id ?>'><?php include "./components/svg/save.php"?></button>
                    </form>
                </div>
            </div>
        <?php endforeach?>

        <?php if ($user->getSavedPosts($connection) != null): ?>
        <br><br><br><br>
        <h2>Saved Posts</h2><br>
        <?php foreach ($user->getSavedPosts($connection) as $key => $post): ?>
        <?php $id = $post->getPostID();?>
        <?php $content = $post->getContent();?>
        <?php $image = $post->getImage();?>
        <?php $date = $post->getDate();?>
        <?php $email = $post->getEmail();?>
        <?php $likes = $post->getLikes($connection);?>
        <?php $postedBy = $post->getPostedBy();?>

            <div class="post">
                <div class="postHeader">
                    <h6 class="date"><?php echo $date ?>
                    <h5 class="name"><?php echo $postedBy ?></h5>
                    <h5 class="likes"><?php echo $likes ?></h5>
                </div>
                <div class="postBody">
                <?php if ($image != null): ?>
                    <img src="<?php echo $image ?>" alt="">
                <?php endif?>
                    <p contenteditable='false'><?php echo "$content" ?></p>
                </div>
                <div class="postFooter notEdit">
                <form action="" method='POST'>
                    <button name='like' value='<?php echo $id ?>'>
                    <?php include "./components/svg/like.php"?>
                    </button>
                </form>

                <form action="" method='POST'>
                    <button name='deleteSaved' value='<?php echo $id ?>'><?php include "./components/svg/delete.php"?></button>
                </form>
                </div>
            </div>
        <?php endforeach?>
    </div>
    <?php endif?>
</div>

