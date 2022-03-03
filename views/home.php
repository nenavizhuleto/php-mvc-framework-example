<?php

use app\core\Application;
?>
<div>
<h2>Photogallery</h2>
<?php if (Application::isGuest()): ?>
    <p>Explore amazing photos</p>
<?php else: ?>
    <p>Welcome <?= Application::$app->user->getDisplayName() ?></p>
<?php endif; ?>
</div>