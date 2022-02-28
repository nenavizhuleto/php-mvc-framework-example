<a href="?post&id=<?= $photo->id ?>" class="post">
    <div class="post__content">
        <p class="post__title"><?= $photo->title ?></p>
        <img src="<?= $photo->img ?>" alt="" class="post__img">
        <div class="post__description">
            <div class="description__text">
                <?= $photo->desc ?>
            </div>
        </div>
        <div class="post__date">
            <span class="date__text">
                <?= $photo->date ?>
            </span>    
        </div>
    </div>
</a>