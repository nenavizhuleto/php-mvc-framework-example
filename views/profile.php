<?php

use ihate\mvc\Application;

$this->title = 'Profile';

$user = Application::$app->user;

?>

<h2><?= $user->getDisplayName() ?><?php if ($user->isAdmin()) echo ' (ADMIN)'; ?></h2>
<div class="profile">
    <div class="profile__content">
        <h3>Profile info:</h3>
        <div class="profile__group">
            <li>Name: <?= $user->getDisplayName() ?></li>
            <li>Email: <?= $user->email; ?></li>
            <li>Type: <?= $user->getDisplayType(); ?></li>
        </div>
    </div>
</div>
<h2>Uploaded Photos</h2>
<div class="gallery">
    <div class="gallery__content">
        <a class="gallery__upload form__input" href="/gallery/upload">Upload new photo</a>
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