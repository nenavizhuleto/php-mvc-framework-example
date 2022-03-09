<?php

// var_dump($photo);

use ihate\mvc\Application;

$id = Application::$app->session->get('user');


?>

<div class="post">
    <div class="post__content">
        <?php if($photo->author->id == $id || $id == 1): ?>
            <div class="post__action-group">
                <a class="post__actionBtn" id="editBtn" href="edit/<?= $photo->id ?>">
                    <img class="post__action-img"  src="http://photogallery/images/pencil.png" alt="">
                </a>
                <a class="post__actionBtn" id="trashBtn" href="delete/<?= $photo->id ?>">
                    <img class="post__action-img"  src="http://photogallery/images/trash.png" alt="">
                </a>
            </div>
        <?php endif; ?>
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