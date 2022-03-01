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
            <?php if (Auth::isset()): ?>
                <div class="posts__actions">
                    <img class="posts__action__btn" id="editBtn" src="./src/images/pencil.png" alt="edit">
                    <img class="posts__action__btn" id="deleteBtn" src="./src/images/trash.png" alt="delete">
                </div>
            <?php endif; ?>
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

<script defer>
    editBtn = document.getElementById('editBtn');
    deleteBtn = document.getElementById('deleteBtn');

    editBtn.addEventListener('click', () => {
        localStorage.setItem('photo', JSON.stringify({title: '<?= $photo->title; ?>', desc: '<?= $photo->desc; ?>', img: '<?= $photo->img ?>'}))
        window.location.assign('?admin=edit-post&id=<?php echo $photo->id ?>');
    })

    deleteBtn.addEventListener('click', () => {
        window.location.assign('?admin=delete-post&id=<?php echo $photo->id ?>');
    })
</script>