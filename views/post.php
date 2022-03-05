<?php

// var_dump($photo);

?>

<div class="post">
    <div class="post__content">
        <div class="post__img-container" style="background-image: url(http://photogallery/<?= $photo->img ?>);">
            <img src="http://photogallery/<?= $photo->img ?>" alt="" class="post__img">
        </div>
        <p class="post__title">
            <?= $photo->title ?>
            <span class="post__date">
                <?= $photo->date ?>
            </span> 
        </p>

        <div class="post__description">
            <div class="post__description__text">
                <?= $photo->description ?>
            </div>
        </div>
    </div>
</div>