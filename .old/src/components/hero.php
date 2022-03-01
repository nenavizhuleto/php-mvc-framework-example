<?php
    require_once('./src/service/controllers/photos.php');
    $photos = get_photos();

?>

<div class="hero">
    <div class="hero__content">
        <?php if ($photos): ?>
            <?php foreach ($photos as $photo): ?>
                <?php include('./src/components/post.php'); ?>
            <?php endforeach; ?>
        <?php else: ?>
            <h2>No posts yet.</h2>
        <?php endif; ?>
    </div>
</div>