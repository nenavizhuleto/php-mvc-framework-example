<?php
    require_once('./src/service/controllers/photos.php');
    $photos = get_photos();

?>

<div class="hero">
    <div class="hero__content">
        <?php foreach ($photos as $photo): ?>
            <?php include('./src/components/post.php'); ?>
        <?php endforeach; ?>
    </div>
</div>