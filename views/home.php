<?php

use app\core\Application;
$this->title = 'Photogallery';
?>
<div>
<h2>Photogallery</h2>
<?php if (Application::isGuest()): ?>
    <p>Explore amazing photos</p>
<?php else: ?>
    <p>Welcome <?= Application::$app->user->getDisplayName() ?></p>
<?php endif; ?>
</div>