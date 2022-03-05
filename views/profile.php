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