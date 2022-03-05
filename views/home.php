<?php

use ihate\mvc\Application;
$this->title = 'Photogallery';
$this->photos = $hero->photos;

?>
<div>
<h2>Photogallery</h2>
<?php if (Application::isGuest()): ?>
    <p>Explore amazing photos <?php echo $id; ?></p>
<?php else: ?>
    <p>Welcome <?= Application::$app->user->getDisplayName() ?></p>
<?php endif; ?>
</div>