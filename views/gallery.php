<?php

$this->title = 'Gallery';

?>
<h2>Gallery</h2>
<div class="gallery">
    <div class="gallery__content">
        <a href="/gallery/upload">Upload new photo</a>
        <div class="photos">
            <div class="photos__content">
                <?php foreach ($photos as $photo): ?>
                    <a href="/post/<?= $photo['id'] ?>" class="photo">
                        <div class="photo__content">
                            <img src="<?= $photo['img'] ?>" alt="" class="photo__img">
                            <p class="photo__title"><?= $photo['title'] ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
        
    </div>
</div>