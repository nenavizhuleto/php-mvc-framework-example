<?php

require_once('./src/service/controllers/photos.php');

$photo = get_photos(function ($p) {
    return $p->id == $_GET['id'];
})[0];


?>

<div class="posts">
    <div class="posts__content">
        <div class="posts__img__container" style="background-image: url(<?= $photo->img ?>);">
            <img src="<?= $photo->img ?>" alt="" class="posts__img">
        </div>
        <p class="posts__title">
            <?= $photo->title ?>
            <span class="posts__date">
                <?= $photo->date ?>
            </span> 
        </p>

        <div class="posts__description">
            <div class="posts__description__text">
                <?= $photo->desc ?>
            </div>
            <?php include_component('sidebar'); ?>
        </div>
    </div>
</div>