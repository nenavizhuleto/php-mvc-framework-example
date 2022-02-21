<?php
    require_once('./src/service/controllers/photos.php');
    $photos = get_photos();

?>

<div class="hero__content">
    
    <?php foreach ($photos as $photo): ?>
        <a href="?post&id=<?= $photo->id ?>" class="post">
            <div class="post__content">
                <p class="post__title"><?= $photo->title ?></p>
                <img src="<?= $photo->img ?>" alt="" class="post__img">
                <div class="post__description">
                    <div class="description__text">
                        <?= $photo->desc ?>
                    </div>
                </div>
                <span class="post__date"><?= $photo->date ?></span>
            </div>
        </a>
    <?php endforeach; ?>
</div>