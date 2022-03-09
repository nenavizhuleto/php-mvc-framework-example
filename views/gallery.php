<?php

use ihate\mvc\Application;

$this->title = 'Gallery';


?>
<h2>Gallery</h2>
<div class="gallery">
    <div class="gallery__content">
        <?php if (Application::isGuest()): ?>
            <p class="gallery__upload form__input">Login to upload photos</p>
        <?php else: ?>
            <a class="gallery__upload form__input" href="/gallery/upload">Upload new photo</a>
        <?php endif; ?>
        <div class="photos">
            <div class="photos__content">
                <?php foreach ($photos as $photo): ?>
                    <a href="/post/<?= $photo->id ?>" class="photo">
                        <div class="photo__content">
                            <img src="<?= $photo->img ?>" alt="" class="photo__img">
                            <div class="photo__caption">
                                <p class="photo__title"><?= $photo->title ?></p>
                                <p class="photo__author"><?= $photo->author->getDisplayName() ?></p>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
        
    </div>
</div>